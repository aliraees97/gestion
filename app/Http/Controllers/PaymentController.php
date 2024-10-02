<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function index()
    {
        $paymentTypes = Payment::get();
        return view('layouts.payment-types.index', compact('paymentTypes'));
    }

    public function paymentStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        try {
            $payment = new Payment();
            $payment->name = $request->name;
            $payment->save();

            Session::flash('success_message', 'Great! Payment Method has been saved successfully!');
            return redirect()->back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function paymentTypeUpdate(Request $request)
    {

        $request->validate([
            'id' => 'required|exists:payments,id',
            'name' => 'required|string|max:255',
        ]);

        // Find the Service by ID
        $paymentType = Payment::find($request->id);

        if ($paymentType) {
            $paymentType->name = $request->name;
            $paymentType->save();

            // Set a session flash message
            session()->flash('success_message', 'Payment Method updated successfully!');

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'success_message' => 'Payment Method not found.'], 404);
    }

    public function paymentTypeDelete($id)
    {
        $service = Payment::findOrfail($id);
        $service->delete();
        return redirect()->back()->with('error_message', 'Payment Method Deleted Successfully!.');
    }
}
