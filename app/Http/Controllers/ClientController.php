<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\RecordSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Customer::latest()->paginate();
        return view('layouts.clients.index', compact('clients'));
    }


    public function clientStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
            'email' => 'required|email|unique:customers,email',
        ]);

        if ($validator->fails()) {
            Session::flash('error_message', 'Please ensure all fields are filled out correctly and try again.');
            return back()->withErrors($validator)->withInput();
        }
        try {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();

            Session::flash('success_message', 'Great! Client has been saved successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function customerDetail($id)
    {
        $user = Customer::find($id);
        $records = RecordSale::where('customer_id', $id)->with('car', 'package')->get();
        // dd($records);

        if (!$user) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        return view('layouts.clients.detail', compact('user', 'records'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        return response()->json($customer);
    }


    public function clientUpdate(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:customers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $customer = Customer::find($request->id);

        if (!$customer) {
            return response()->json(['error' => 'Client not found'], 404);
        }

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->save();

        session()->flash('success_message', 'Client updated successfully!');
        return response()->json(['success' => true]);
    }

    public function noteUpdate(Request $request)
    {
        $input = $request->all();
        $user = Customer::find($request->id);
        // dd($user);
        $user->note = $input['note'];
        $user->save();
        Session::flash('success_message', 'Great! Note has been saved successfully!');
        return redirect()->back();
    }


    public function clientDelete($id)
    {
        $findClient = Customer::findOrfail($id);
        $findClient->delete();
        return redirect()->back()->with('error_message', 'Client Deleted Successfully!');
    }
}
