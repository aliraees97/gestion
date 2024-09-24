<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{

    public function index()
    {
        $washTypes = Package::latest()->paginate();
        return view('layouts.wash-types.index', compact('washTypes'));
    }

    public function washTypeStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $customer = new Package();
            $customer->name = $request->name;
            $customer->price = $request->price;

            $customer->save();

            Session::flash('success_message', 'Great! Wash Type has been saved successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function washTypeUpdate(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:packages,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Find the wash type by ID
        $washType = Package::find($request->id);

        if ($washType) {
            $washType->name = $request->name;
            $washType->price = $request->price;
            $washType->save();

            // Set a session flash message
            session()->flash('success_message', 'Wash type updated successfully!');

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'success_message' => 'Wash type not found.'], 404);
    }


    public function washTypeDelete($id)
    {
        $findWashType = Package::findOrfail($id);
        $findWashType->delete();
        return redirect()->back()->with('error_message', 'Wash Type Deleted Successfully!.');
    }
}