<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Package;
use App\Models\Payment;
use App\Models\RecordSale;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ManagementController extends Controller
{
    public function index()
    {
        $records = RecordSale::with(['customer', 'car', 'package', 'payment'])->latest()->get();
        // dd($records);
        $customer = Customer::get();
        $cars = Car::get();
        $package = Package::get();
        $services = Service::get();
        $payment = Payment::get();

        return view('layouts.gestion.index', compact('records', 'customer', 'package', 'services', 'payment', 'cars'));
    }

    public function storeRecord(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'package_id' => 'required|exists:packages,id',
            'car_id' => 'required|exists:cars,id',
            'services' => 'required|array',
            'services.*' => 'string',
            'payment_id' => 'required|exists:payments,id',
        ]);

        // Get the package price
        $package = Package::find($request->package_id);
        $packagePrice = $package->price;

        // Get the prices of the selected services
        $servicePrices = Service::whereIn('name', $request->services)->pluck('price');

        // Calculate total price
        $totalPrice = $packagePrice + $servicePrices->sum();

        // Create new RecordSale
        $record = new RecordSale();
        $record->customer_id = $request->customer_id;
        $record->package_id = $request->package_id;
        $record->car_id = $request->car_id;
        $record->services = json_encode($request->services);
        $record->payment_id = $request->payment_id;
        $record->total = $totalPrice;
        $record->save();

        $carRecord = Car::where('id', $record->car_id)->first();
        $carRecord->status = 'completed';
        $carRecord->save();

        session()->flash('success_message', 'Record has been added successfully.');
        return redirect()->back();
    }

    public function getRecord($id)
    {
        $record = RecordSale::findOrFail($id);
        return response()->json($record);
    }

    public function updateRecord(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required|exists:record_sales,id',
            'package_id' => 'required|exists:packages,id',
            'car_id' => 'required|exists:cars,id',
            'services' => 'required|array',
            'payment_id' => 'required|exists:payments,id',
        ]);

        $record = RecordSale::find($validatedData['id']);
        // dd($record);
        // Calculate the total price
        $packagePrice = Package::find($validatedData['package_id'])->price;
        $servicesPrice = Service::whereIn('name', $validatedData['services'])->sum('price');

        $totalPrice = $packagePrice + $servicesPrice;

        // Update record
        $record->package_id = $validatedData['package_id'];
        $record->car_id = $validatedData['car_id'];
        $record->services = json_encode($validatedData['services']);
        $record->payment_id = $validatedData['payment_id'];
        $record->total = $totalPrice;
        $record->save();

        session()->flash('success_message', 'Record updated successfully.');
        return response()->json(['success' => 'Record updated successfully']);
    }

    public function recordDelete($id)
    {
        $findRecord = RecordSale::findOrfail($id);
        $findRecord->delete();
        return redirect()->back()->with('error_message', 'Record Deleted Successfully!.');
    }

    public function closeTodaySale(Request $request)
    {
        RecordSale::where('status', 'open')
            ->whereDate('created_at', today())
            ->update(['status' => 'closed']);

        return response()->json(['message' => 'Sales closed successfully.']);
    }

    public function getClosedSales()
    {
        // Group by date, calculate total sum for each date, and paginate the result
        $closedSales = RecordSale::selectRaw('DATE(created_at) as date, SUM(total) as total_sales')
            ->where('status', 'closed')
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->paginate(10);

        return response()->json($closedSales);
    }
}
