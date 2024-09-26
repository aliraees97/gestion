<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{

    public function index()
    {

        // $cars = Car::with('customerCar')->paginate();
        $cars = Car::paginate(10);
        // dd($cars);
        return view('layouts.car.index', compact('cars'));
    }

    public function carStore(Request $request)
    {
        // dd($request->all());
        try {

            $car = new Car();
            $car->name = $request->name;
            $car->model = $request->model;
            $car->license_plate = $request->license_plate;
            $car->color = $request->color;
            $car->save();

            Session::flash('success_message', 'Great! Car has been saved successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
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
}
