<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index() {
        $users = DB::table('users')
                    ->where('role', 'employee')
                    ->get();
        return view('schedule_list', compact('users'));
    }

    public function schedule(Request $request) {

        $validator = Validator::make($request->all(), [
            'user' => 'required',
            'pickup' => 'required',
            'dropoff' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'EditSchedule');
        }

        $result = DB::table('employee_schedules')
            ->where('employee_id', $request->user)
            ->first();

        if ($result) {
            $response = DB::table('employee_schedules')
                ->where('employee_id', $request->user)
                ->update([
                    'pickup_time' => $request->pickup,
                    'dropoff_time' => $request->dropoff,
                    'updated_at' => now()
                ]);


            if ($response) {
                return back()->withErrors([
                    'schedule_status' => true,
                ]);
            } else {
                return back()->withErrors([
                    'schedule_status' => false,
                ]);
            }
        }else {
            $response = DB::table('employee_schedules')
                ->insert([
                    'employee_id' => $request->user,
                    'pickup_time' => $request->pickup,
                    'dropoff_time' => $request->dropoff,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            if ($response) {
                return back()->withErrors([
                    'schedule_status' => true,
                ]);
            } else {
                return back()->withErrors([
                    'schedule_status' => false,
                ]);
            }
        }
    }

    public function mySchedule() {
        if (config('role') == 'employee') {
            $users = DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->get();
        }else {
            $car = DB::table('car_assignment_drivers')
            ->join('cars', 'car_assignment_drivers.car_id', 'cars.car_id')
            ->where('car_assignment_drivers.driver_id', Auth::user()->id)
            ->first();
            $users = $car?DB::table('users')
            ->join('car_assignment_employees', 'car_assignment_employees.employee_id', 'users.id')
            ->where('car_id', $car->car_id)
            ->get():false;
        }
        return view('schedule_list', compact('users'));
    }

    public function createAddress (Request $request) {

        $validator = Validator::make($request->all(), [
            'district' => 'required',
            'sector' => 'required',
            'cell' => 'required',
            'address' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        }

        $result = DB::table('addresses')
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($result) {
            $response = DB::table('addresses')
                ->where('user_id', Auth::user()->id)
                ->update([
                    'district' => $request->district,
                    'sector' => $request->sector,
                    'cell' => $request->cell,
                    'street' => $request->street,
                    'address' => $request->address,
                    'updated_at' => now()
                ]);


            if ($response) {
                return back()->withErrors([
                    'address_status' => true,
                ]);
            } else {
                return back()->withErrors([
                    'address_status' => false,
                ]);
            }
        }else {
            $response = DB::table('addresses')
                ->insert([
                    'user_id' => Auth::user()->id,
                    'district' => $request->district,
                    'sector' => $request->sector,
                    'cell' => $request->cell,
                    'street' => $request->street,
                    'address' => $request->address,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

            if ($response) {
                return back()->withErrors([
                    'address_status' => true,
                ]);
            } else {
                return back()->withErrors([
                    'address_status' => false,
                ]);
            }
        }
    }
}
