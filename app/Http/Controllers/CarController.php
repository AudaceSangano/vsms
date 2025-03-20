<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Car;

class CarController extends Controller
{
    public function createCar(Request $request) {
        $validator = Validator::make($request->all(), [
            'car_model' => 'required|string|max:255',
            'car_registration_number' => 'required|string|max:255|unique:cars,car_registration_number',
            'car_color' => 'required|string|max:50',
            'car_capacity' => 'required|integer|min:1',
            'is_active' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'CreateCar');
        }

        $response = DB::table('cars')->insert([
            'car_model' => $request->car_model,
            'car_registration_number' => $request->car_registration_number,
            'car_color' => $request->car_color,
            'car_capacity' => $request->car_capacity,
            'is_active' => $request->is_active,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        if ($response) {
            return back()->withErrors([
                'create_car_status' => true,
            ]);
        } else {
            return back()->withErrors([
                'create_car_status' => false,
            ]);
        }
    }

    public function listCars() {
        $cars = DB::table('cars')->get();
        return view('car_list', compact('cars'));
    }

    function statusCar($id) {
        $status = DB::table('cars')
                        ->where('car_id', $id)
                        ->first();

        if ($status->is_active == '1') {
            $response = DB::table('cars')
                        ->where('car_id', $id)
                        ->update([
                            'is_active' => '0'
                        ]);
            if ($response) {
                return back()->withErrors([
                    'lock_car_status' => true,
                ]);
            }else {
                return back()->withErrors([
                    'lock_car_status' => false,
                ]);
            }
        }else {
            $response = DB::table('cars')
                        ->where('car_id', $id)
                        ->update([
                            'is_active' => '1'
                        ]);
            if ($response) {
                return back()->withErrors([
                    'unlock_car_status' => true,
                ]);
            }else {
                return back()->withErrors([
                    'unlock_car_status' => false,
                ]);
            }
        }
    }

    function removeCars($id) {
        $response =  DB::table('cars')
                    ->where('car_id', $id)
                    ->delete();
        if ($response) {
            return back()->withErrors([
                'remove_car_status' => true,
            ]);
        }else {
            return back()->withErrors([
                'remove_car_status' => false,
            ]);
        }
    }

    function updateCar(Request $request) {
        $validator = Validator::make($request->all(), [
            'car_id' => 'required|exists:cars,car_id',
            'car_model' => 'required|string|max:255',
            'car_registration_number' => 'required|string|max:255',
            'car_color' => 'required|string|max:50',
            'car_capacity' => 'required|integer|min:1',
            'is_active' => 'required|in:1,0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'EditCarModal');
        }

        $response = DB::table('cars')
            ->where('car_id', $request->car_id)
            ->update([
                'car_model' => $request->car_model,
                'car_registration_number' => $request->car_registration_number,
                'car_color' => $request->car_color,
                'car_capacity' => $request->car_capacity,
                'is_active' => $request->is_active,
                'updated_at' => now()
            ]);

        if ($response) {
            return back()->withErrors([
                'update_car_status' => false,
            ]);
        } else {
            return back()->withErrors([
                'update_car_status' => true,
            ]);
        }
    }

    public function assignCarToDriver(Request $request) {
        $validator = Validator::make($request->all(), [
            'car' => 'required',
            'driver' => 'required',
        ])->after(function ($validator) use ($request) {
            if ($request->car === 'none' && $request->driver === 'none') {
                $validator->errors()->add('car', 'If car is "none", driver must not be "none".');
                $validator->errors()->add('driver', 'If driver is "none", car must not be "none".');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'Car2Driver');
        }

        if ($request->car=="none" || $request->driver=="none") {
            if ($request->car=="none") {
                $response = DB::table('car_assignment_drivers')
                    ->where('driver_id', $request->driver)
                    ->delete();
            }
            if ($request->driver=="none") {
                $response = DB::table('car_assignment_drivers')
                    ->where('car_id', $request->car)
                    ->delete();
            }

        }else {
            DB::table('car_assignment_drivers')
                ->where('car_id', $request->car)
                ->delete();

            DB::table('car_assignment_drivers')
                ->where('driver_id', $request->driver)
                ->delete();

            $response = DB::table('car_assignment_drivers')->insert([
                'car_id' => $request->car,
                'driver_id' => $request->driver,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }


        if ($response) {
            return back()->withErrors([
                'assign_car_status' => true,
            ]);
        } else {
            return back()->withErrors([
                'assign_car_status' => false,
            ]);
        }
    }

    public function assignCarToEmployee(Request $request) {
        $validator = Validator::make($request->all(), [
            'car' => 'required',
            'employee' => 'required',
        ])->after(function ($validator) use ($request) {
            if ($request->car === 'none' && $request->employee === 'none') {
                $validator->errors()->add('car', 'If car is "none", employee must not be "none".');
                $validator->errors()->add('employee', 'If employee is "none", car must not be "none".');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal', 'Car2Employee');
        }


        if ($request->car=="none" || $request->employee=="none") {
            if ($request->car=="none") {
                DB::table('car_assignment_employees')
                    ->where('employee_id', $request->employee)
                    ->delete();
            }
            if ($request->employee=="none") {
                DB::table('car_assignment_employees')
                    ->where('car_id', $request->car)
                    ->delete();
            }

        }else {

            DB::table('car_assignment_employees')
                ->where('car_id', $request->car)
                ->delete();

            DB::table('car_assignment_employees')
                ->where('employee_id', $request->employee)
                ->delete();

            $response = DB::table('car_assignment_employees')->insert([
                'car_id' => $request->car,
                'employee_id' => $request->employee,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        if ($response) {
            return back()->withErrors([
                'assign_car_status' => true,
            ]);
        } else {
            return back()->withErrors([
                'assign_car_status' => false,
            ]);
        }
    }
}
