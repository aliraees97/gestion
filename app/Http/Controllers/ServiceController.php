<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate();
        return view('layouts.service.index', compact('services'));
    }

    public function serviceStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $service = new Service();
            $service->name = $request->name;
            $service->price = $request->price;

            $service->save();

            Session::flash('success_message', 'Great! Addons has been saved successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function serviceUpdate(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:services,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        // Find the Service by ID
        $washType = Service::find($request->id);

        if ($washType) {
            $washType->name = $request->name;
            $washType->price = $request->price;
            $washType->save();

            // Set a session flash message
            session()->flash('success_message', 'Addons updated successfully!');

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'success_message' => 'Addons not found.'], 404);
    }

    public function serviceDelete($id)
    {
        $service = Service::findOrfail($id);
        $service->delete();
        return redirect()->back()->with('error_message', 'Addons Deleted Successfully!.');
    }
}
