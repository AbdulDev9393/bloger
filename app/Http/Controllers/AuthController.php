<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class AuthController extends Controller
{
    //
    function login(){
        return view('login');
    }
    function Registar(){
        return view('Registar');
    }

public function Registar_add(Request $request)
{
        $otp = rand(100000, 999999);

    $admin = Admin::where('email', $email)->first();

    if ($admin) {
       
        $admin->passwords = $request->password;
        $admin->pastcode = $otp;
        $admin->save();

        // Send email about password update (optional)
            Mail::raw(
                "Your Admin OTP is: $otp\n\nValid for 5 minutes.",
                function ($message) use ($email) {
                    $message->to($email)
                            ->subject('Admin OTP Verification');
                }
            );


        
        return view('Passcodevarify', compact('email'))->with('success', 'Password updated. Please continue.');
    }

    // Email does not exist → create new admin with OTP


    $newAdmin = new Admin();
    $newAdmin->fname = $request->firstName;
    $newAdmin->lname = $request->lastName;
    $newAdmin->email = $request->email; 
    $newAdmin->passwords = $request->password; 
    $newAdmin->pastcode = $otp; 
    $newAdmin->save();

    $email=$request->email; 
    Mail::raw(
        "Your Admin OTP is: $otp\n\nValid for 5 minutes.",
        function ($message) use ($email) {
            $message->to($email)
                    ->subject('Admin OTP Verification');
        }
    );

    return view('Passcodevarify', compact('email'));
}



public function verifyOtp(Request $request)
{
    // Validation
    $request->validate([
        'otp' => 'required|digits:6',
        'email' => 'required|email'
    ]);
   
    $admin = Admin::where('email', $request->email)->first();

    if (!$admin) {
        return back()->with('error', 'Email not found.');
    }

    if ($admin->pastcode == $request->otp) {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $admin->lname;
            $user->role = "admin";
            $user->email = $request->email;
            $user->password = Hash::make($admin->passwords);
            $user->email_verified_at = now();
            $user->save();
        } else {
            $user->password = Hash::make($admin->passwords);
            $user->save();
           return redirect()->route('frontend.login')->with('success', 'Password Changed successfully.');
        }

        return redirect()->route('frontend.login')->with('success', 'Your acount gunrated successfully.');
    }

    return back()->with('error', 'Invalid OTP.');
}   

public function login_post(Request $request)
{
   
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    $email=$request->email;

    $user = User::where('email', $request->email)->first();
    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error', 'Invalid email or password.');
    }

    // Generate OTP
    $otp = rand(100000, 999999);

    // Send OTP email
    Mail::raw(
        "Your Admin OTP is: $otp\n\nValid for 5 minutes.",
        function ($message) use ($email) {
            $message->to($email)
                    ->subject('Admin OTP Verification');
        }
    );

    // Show OTP page and pass OTP as hidden input
    return view('login_passcode', compact('otp','email'));
}

  public function logout(Request $request)
    {
        // Session clear کریں
        $request->session()->flush();

        // Laravel Auth logout بھی کریں اگر use ہو رہا ہے
        Auth::logout();

        // Redirect login page پر
        return redirect()->route('frontend.login')->with('success', 'You have logged out successfully.');
    }
public function login_passcode(Request $request)
{
    
   
    
    // OTP check
    if ($request->otp !== $request->otp_privice) {
         $text = 'Invalid Key';
        return redirect()->route('frontend.error.message', compact('text'));
    }
   
    // Find user by email
    $user = User::where('email', $request->email)->first();

        if (!$user) {
            $text = 'Invalid User';
        return redirect()->route('frontend.error.message', compact('text'));

        }
    // Login the user
    Auth::login($user);

    return redirect()->route('admin.dashboard')
        ->with('success','Welcome Muhammad Abdul');
}
public function error_message($text)
{
    return view('error_page', compact('text'));
}
}