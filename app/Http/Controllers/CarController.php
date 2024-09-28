<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Payment;
use App\Models\RecordSale;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{

    public function index()
    {
        $package = Package::get();
        $payments = Payment::get();
        $services = Service::get();
        $customer = Customer::get();
        $cars = Car::with(['customer', 'package', 'payment'])->orderBy('created_at', 'asc')->paginate(5);
        // dd($cars);
        return view('layouts.car.index', compact('cars', 'customer', 'package', 'services', 'payments'));
    }

    public function deliverCars()
    {
        $cars = Car::where('status', 'delivered')->with('customer')->orderBy('created_at', 'asc')->paginate(5);
        // dd($cars);
        return view('layouts.car.delivered-cars', compact('cars'));
    }

    public function carStore(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
            'name' => 'required',
            'model' => 'required',
            'license_plate' => 'required|unique:cars,license_plate',
            'color' => 'required',
            'package_id' => 'required',
            'services' => 'required|array',
            'pay_status' => 'required|in:paid,unpaid',
        ]);

        if ($validator->fails()) {
            // Return validation errors as JSON if validation fails
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            // Create and save a new car record
            $car = new Car();
            $car->customer_id = $request->customer_id;
            $car->name = $request->name;
            $car->model = $request->model;
            $car->license_plate = $request->license_plate;
            $car->color = $request->color;
            $car->package_id = $request->package_id;
            $car->services = json_encode($request->services);
            $car->pay_status = $request->pay_status;
            $car->save();

            // Flash a success message to the session
            Session::flash('success_message', 'Great! Car has been saved successfully!');
            return response()->json(['success' => true], 200); // Send success response
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'An error occurred while saving the client.'], 500);
        }
    }

    public function carStoreAjax(Request $request)
    {

        try {
            $car = Car::create($request->all());
            return response()->json([
                'success' => true,
                'car' => $car
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function carUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'model' => 'required',
            'color' => 'required',
        ]);

        $car = Car::find($request->id);

        if ($car) {
            $car->name = $request->name;
            $car->model = $request->model;
            $car->license_plate = $request->license_plate;
            $car->color = $request->color;
            $car->save();

            // Set a session flash message
            session()->flash('success_message', 'Car updated successfully!');

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'success_message' => 'Car not found.'], 404);
    }

    public function carDelete($id)
    {
        $car = Car::findOrfail($id);
        $car->delete();
        return redirect()->back()->with('error_message', 'Car Deleted Successfully!.');
    }


    public function completeStatus($id)
    {
        $car = Car::findOrFail($id);
        $car->status = 'completed';
        $car->completed_at =  Carbon::now();
        $car->save();
        Session::flash('success_message', 'Car status updated successfully.!');
        return response()->json(['success' => true]);
    }

    public function completePayment($id, Request $request)
    {
        // Retrieve the car by ID
        $car = Car::findOrFail($id);

        // Check if the package exists
        $package = Package::find($car->package_id);
        if (!$package) {
            return response()->json(['success' => false, 'message' => 'Package not found.']);
        }

        // Retrieve the package price
        $packagePrice = $package->price;

        // Decode the services JSON string into an array
        $servicesArray = json_decode($car->services, true);

        // If decoding fails, return an error
        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['success' => false, 'message' => 'Invalid services format.']);
        }

        // Retrieve the prices of the services
        $servicePrices = Service::whereIn('name', $servicesArray)->pluck('price');

        // Calculate total price
        $totalPrice = $packagePrice + $servicePrices->sum();

        // Check if payment_id is provided
        if (!$request->payment_id) {
            return response()->json(['success' => false, 'message' => 'Payment method is required.']);
        }

        // Create a record of the sale
        RecordSale::create([
            'car_id' => $car->id,
            'payment_id' => $request->payment_id,
            'total' => $totalPrice,
        ]);

        $car->pay_status = 'paid';
        $car->save();

        // Flash success message
        Session::flash('success_message', 'Payment Method updated successfully!');

        // Return success response to the AJAX request
        return response()->json(['success' => true]);
    }

    public function deliverStatus($id)
    {
        $car = Car::findOrFail($id);
        $car->status = 'delivered';
        $car->save();
        Session::flash('success_message', 'Car status updated successfully.!');
        return response()->json(['success' => true]);
    }
}
