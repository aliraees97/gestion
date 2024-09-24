<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Customer;
use App\Models\RecordSale;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $customer = Customer::get();
        $record = RecordSale::get();
        // dd($record);
        $car = Car::get();
        $recordCars = $record->pluck('car');
        // dd(count($recordCars));
        return view('layouts.dashboard', compact('customer', 'record', 'recordCars', 'car'));
    }
}
