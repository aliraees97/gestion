<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Customer;
use App\Models\RecordSale;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;

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


    public function usersList()
    {
        $admins = User::paginate(10);
        return view('layouts.admin.index', compact('admins'));
    }


    public function adminStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->is_admin = 1;

            $user->save();

            Session::flash('success_message', 'Great! Admin has been saved successfully!');
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the client.'], 500);
        }
    }


    public function adminDelete($id)
    {
        $user = User::findOrfail($id);
        $user->delete();
        return redirect()->back()->with('error_message', 'User Deleted Successfully!.');
    }


    public function adminUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id,
        ]);
        $user = User::find($request->id);

        if ($user) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            return response()->json(['success' => true, 'success_message' => 'User updated successfully!']);
        }

        // Return an error if the user is not found
        return response()->json(['success' => false, 'error_message' => 'User not found.'], 404);
    }


    public function adminDetail($id)
    {
        $user = User::find($id);

        // dd($records);

        if (!$user) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        return view('layouts.admin.admin-detail', compact('user'));
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_password_confirmation' => ['same:new_password'], // Ensure this matches
        ]);

        // Retrieve the currently authenticated user
        $user = User::find(auth()->user()->id);

        // Update the user's password
        $user->update(['password' => Hash::make($request->new_password)]);

        // Return a success response
        Session::flash('success_message', 'Password updated successfully');
        return response()->json(['success' => true]);
    }
}