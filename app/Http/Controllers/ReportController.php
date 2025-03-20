<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    public function driverList() {
        $users = DB::table('users')
                    ->where('role', 'driver')
                    ->get();
        return view('driver_list', compact('users'));
    }

    public function employeeList() {
        $users = DB::table('users')
                    ->where('role', 'employee')
                    ->get();
        return view('employee_list', compact('users'));
    }

    public function dayScheduleList() {
        $users = DB::table('users')
                    ->join('employee_schedules', 'employee_schedules.employee_id', 'users.id')
                    ->where('role', 'employee')
                    ->whereBetween('pickup_time', ['07:00:00', '17:00:00'])
                    ->orWhereBetween('dropoff_time', ['07:00:00', '17:00:00'])
                    ->get();
        return view('schedule_day_list', compact('users'));
    }

    public function nightScheduleList() {
        $users = DB::table('users')
                    ->join('employee_schedules', 'employee_schedules.employee_id', 'users.id')
                    ->where('role', 'employee')
                    ->where(function ($query) {
                        $query->whereBetween('pickup_time', ['17:00:00', '23:59:59'])
                              ->orWhereBetween('pickup_time', ['00:00:00', '07:00:00']);
                    })
                    ->orWhere(function ($query) {
                        $query->whereBetween('dropoff_time', ['17:00:00', '23:59:59'])
                              ->orWhereBetween('dropoff_time', ['00:00:00', '07:00:00']);
                    })
                    ->get();
        return view('schedule_day_list', compact('users'));
    }
}
