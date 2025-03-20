<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $result = Auth::attempt([
            'email' => $credentials['username'],
            'password' => $credentials['password'],
        ]);

        if ($result) {
            $status = User::where('email',$request->username)->first();
            if ($status->is_active=='1') {
                $request->session()->regenerate();
                return redirect()->route('dashboard');
            }else {
                return back()->withErrors([
                    'error' => 'User Locked',
                ])->onlyInput('email');
            }
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function update(Request $request)
    {
            $request->validate([
                'old_password' => 'required',
                'password' => 'required|confirmed',
            ]);

            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->withErrors([
                    'change_password_message' => false,
                ]);
            }

            User::where('id',auth()->user()->id)->update([
                'password' => Hash::make($request->password)
            ]);

            return back()->withErrors([
                'change_password_message' => true,
            ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile')) {
            if ($user->profile) {
                Storage::disk('public')->delete($user->profile);
            }

            $path = $request->file('profile')->store('profiles', 'public');

            $user->profile = $path;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');

        $user->save();
        return back()->withErrors([
            'change_profile_message' => true,
        ]);
    }

    public function changeLocale($lang) {
        if (in_array($lang,['en', 'kin'])) {
            App::setLocale($lang);
            Session::put('locale', $lang);
        }

        return back();
    }

    public function reset(){
        return view('authentication.auth-password-reset');
    }

    public function validatePhone(Request $request) {
        $request->validate([
            'telephone' => 'required',
        ]);

        $is_exist = DB::table('users')->where('phone', $request->telephone)->first();

        if (!$is_exist) {
            return redirect()->back()->with('error', 'Number provided not Exist!');
        }

        $is_exist_pin = DB::table('password_reset_pin')->where('user_id', $is_exist->id)->first();

        if ($is_exist_pin) {
            DB::table('password_reset_pin')->where('user_id', $is_exist->id)->delete();
        }
        $randomNumber = rand(1000, 9999);

        $result = DB::table('password_reset_pin')->insert([
            'user_id' => $is_exist->id,
            'pin' => $randomNumber
        ]);

        if ($result) {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.mista.io/sms',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('to' => '25'.$request->telephone,'from' => 'E-Notifier','unicode' => '0','sms' => 'Hello from Smart Card, Your Pin: '.$randomNumber,'action' => 'send-sms'),
            CURLOPT_HTTPHEADER => array(
                'x-api-key: 696|sqVKpDzMSu2Rlob78G45cRNqdSjwz68waEUZaXSv'
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
        }



        if ($result) {
            return redirect()->route('password.confirm')->with('telephone', $request->telephone);
        }else {
            return redirect()->back()->with('error', 'Failed to reset password, try again!');
        }
    }

    public function two_step(){
        return view('authentication.auth-two-step');
    }

    public function pin_verify(Request $request){
        $request->validate([
            'verification_code' => 'required',
        ]);

        $telephone = $request->verification_number;
        $is_exist = DB::table('users')->where('phone', $telephone)->first();
        $is_exist_pin = DB::table('password_reset_pin')->where('user_id', $is_exist->id)->first();

        if ($is_exist_pin->pin==$request->verification_code) {
            $password = $this->generatePassword(10);
            $response = DB::table('users')->where('id', $is_exist->id)
                ->update([
                    'password' => Hash::make($password)
                ]);
            if ($response) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.mista.io/sms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('to' => '25'.$telephone,'from' => 'E-Notifier','unicode' => '0','sms' => 'Hello from Smart Card, Your new Password: '.$password,'action' => 'send-sms'),
                CURLOPT_HTTPHEADER => array(
                    'x-api-key: 637|PjDk41fLnKqnVzRdcvN1sICSwNOMr9HTwssjkpDc'
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
            }

            DB::table('password_reset_pin')->where('user_id', $is_exist->id)->delete();
            return redirect()->route('login')->with('success', 'Password Sent to Your Number Provided.');
        }else {
            return redirect()->route('login')->with('fail', 'Password Failed to Reset, Try again.');
        }

    }

    function generatePassword($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $password;
    }

    function address($user) {
        $user_id = $user;
        $user_information = DB::table('users')->where('id', $user_id)->first();
        $address_information = DB::table('addresses')->where('user_id', $user_id)->first();
        $district = "";
        $sector = "";
        $cell = "";
        $street = "";
        $address = "";

        if ($address_information) {
            $district =$address_information->district;
            $sector =$address_information->sector;
            $cell =$address_information->cell;
            $street =$address_information->street;
            $address =$address_information->address;
        }

        $data = [
            'user' =>$user_information,
            'address' =>[
                'district' => $district,
                'sector' => $sector,
                'cell' => $cell,
                'street' => $street,
                'address' => $address
            ]
        ];

        return view('setting_address', $data);
    }
}
