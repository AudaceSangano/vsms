<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;

class MainController extends Controller
{
    public function index() {
        if (config('role') == 'admin' || config('role') == 'supervisor') {
            $cars = DB::table('cars')->get()->count();
            $active_cars = DB::table('cars')->where('is_active', '1')->get()->count();

            $users = DB::table('users')->get()->count();
            $active_users = DB::table('users')->where('is_active', '1')->get()->count();
            $drivers = DB::table('users')->where('role', 'driver')->where('is_active', '1 ')->get()->count();

            $schedules = DB::table('users')
                        ->where('role', 'employee')
                        ->get();

            $pickup = DB::table('employee_schedules')
                        ->where(function ($query) {
                            $query->where('pickup_time', '>=', '22:00:00')
                                ->orWhere('pickup_time', '<', '05:00:00');
                        })
                        ->get()->count();

            $dropoff = DB::table('employee_schedules')
                        ->where(function ($query) {
                            $query->where('dropoff_time', '>=', '22:00:00')
                                ->orWhere('dropoff_time', '<', '06:00:00');
                        })
                        ->get()->count();

            $data = [
                'totalCar' => $cars,
                'activeCar' => $active_cars,
                'totalUsers' => $users,
                'activeUsers' => $active_users,
                'totalActiveDriver' => $drivers,
                'schedules' => $schedules,
                'pickUp' => $pickup,
                'dropOff' => $dropoff,
            ];
        }

        if (config('role') == 'employee') {
            $car = DB::table('car_assignment_employees')
                        ->join('cars', 'car_assignment_employees.car_id', 'cars.car_id')
                        ->where('car_assignment_employees.employee_id', Auth::user()->id)
                        ->first();

             $driver = $car ?DB::table('car_assignment_drivers')
            ->join('users', 'car_assignment_drivers.driver_id', 'users.id')
            ->where('car_assignment_drivers.car_id', $car->car_id)
            ->first():false;

            $address = DB::table('addresses')
                        ->where('user_id', Auth::user()->id)
                        ->first();

            $schedule = DB::table('employee_schedules')
                        ->where('employee_id', Auth::user()->id)
                        ->first();

            $data = [
                'myCar' => $car ? $car->car_registration_number:'No car Assigned',
                'myDriver' => $driver ? $driver->name:"No Driver",
                'driverContact' => $driver ? $driver->phone:"No Driver Contact",
                'myAddress' => $address ? $address->district."/".$address->sector."/".$address->address:"No Address Setted",
                'pickupTime' => $schedule ? $schedule->pickup_time : "Not configured",
                'dropoffTime' => $schedule ? $schedule->dropoff_time : "Not configured",
            ];
        }

        if (config('role') == 'driver') {
            $car = DB::table('car_assignment_drivers')
            ->join('cars', 'car_assignment_drivers.car_id', 'cars.car_id')
            ->where('car_assignment_drivers.driver_id', Auth::user()->id)
            ->first();
            // return $car;

            $pickup = DB::table('employee_schedules')
                        ->where(function ($query) {
                            $query->where('pickup_time', '>=', '22:00:00')
                                ->orWhere('pickup_time', '<', '05:00:00');
                        })
                        ->get()->count();

            $dropoff = DB::table('employee_schedules')
                        ->where(function ($query) {
                            $query->where('dropoff_time', '>=', '22:00:00')
                                ->orWhere('dropoff_time', '<', '06:00:00');
                        })
                        ->get()->count();

            $schedules = DB::table('car_assignment_employees')
            ->join('car_assignment_drivers', 'car_assignment_drivers.car_id', 'car_assignment_employees.car_id')
            ->join('users', 'users.id', 'car_assignment_employees.employee_id')
            ->where('car_assignment_drivers.driver_id', Auth::user()->id)
            ->select('users.*')
            ->get();

            $data = [
                'myCar' => $car ? $car->car_registration_number:'No car Assigned',
                'pickUp' => $pickup,
                'dropOff' => $dropoff,
                'schedules' => $schedules
            ];
        }

        return view('dashboard', $data);
    }

    public function createUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'profile' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required',
            'status' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'CreateUser');
        }

        $path = $request->file('profile')->store('profiles', 'public');

        $response = DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->phone),
                'role' => $request->role,
                'is_active' => $request->status,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'profile' => $path,
                'created_at' => now(),
                'updated_at' => now()
        ]);

        if ($response) {
            return back()->withErrors([
                'create_user_status' => true,
            ]);
        }else {
            return back()->withErrors([
                'create_user_status' => false,
            ]);
        }
    }

    public function ListUser(){
        $users = DB::table('users')
                    ->where('role', '!=', 'admin')
                    ->where('role', '!=', 'student')
                    ->get();
        return view('user_list', compact('users'));
    }

    function statusUser($id) {
        $status = DB::table('users')
                        ->where('id', $id)
                        ->first();

        if ($status->is_active == '1') {
            $response = DB::table('users')
                        ->where('id', $id)
                        ->update([
                            'is_active' => '0'
                        ]);
            if ($response) {
                return back()->withErrors([
                    'lock_student_status' => true,
                ]);
            }else {
                return back()->withErrors([
                    'lock_student_status' => false,
                ]);
            }
        }else {
            $response = DB::table('users')
                        ->where('id', $id)
                        ->update([
                            'is_active' => '1'
                        ]);
            if ($response) {
                return back()->withErrors([
                    'unlock_student_status' => true,
                ]);
            }else {
                return back()->withErrors([
                    'unlock_student_status' => false,
                ]);
            }
        }
    }

    function removeUser($id) {
        $response =  DB::table('users')
                    ->where('id', $id)
                    ->delete();
        if ($response) {
            return back()->withErrors([
                'remove_user_status' => true,
            ]);
        }else {
            return back()->withErrors([
                'remove_user_status' => false,
            ]);
        }
    }

    public function updateUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);


        if ($validator->fails()) {
            return back()->withErrors([
                'update_user_status' => true,
            ]);
        }
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'is_active' => $request->status,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ];

        $response = DB::table('users')->where('id', $request->id)->update($data);

        if ($response) {
            return back()->withErrors([
                'update_user_status' => false,
            ]);
        }else {
            return back()->withErrors([
                'update_user_status' => true,
            ]);
        }
    }

    public function updateStudent(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'registration' => 'required',
            'email' => 'required',
            'department' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors([
                'update_user_status' => true,
            ]);
        }

        // Update user table
        $data_user = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'is_active' => $request->status,
        ];
        DB::table('users')->where('id', $request->id)->update($data_user);

        // Update students table
        $data = [
            'reg' => $request->registration,
            'dept' => $request->department,
        ];
        $response = DB::table('students')->where('user', $request->id)->update($data);

        // Store department in session before redirect
        session(['department' => $request->department]);

        return redirect()->route('student.list1')
            ->withErrors(['update_student_status' => $response ? false : true]);
    }
}
