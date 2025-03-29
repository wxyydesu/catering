<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login form
    public function login()
     {
          return view("auth.login");
     }
     public function registration()
     {
          return view("auth.registration");
     }              


    // Handle user registration
    public function registerUser(Request $request)
     {
          $request->validate([
               'nama' => 'required',
               'email' => 'required|email|unique:users',
               'password' => 'required|min:5|max:12',
               'level' => 'required'
          ]);
          $user = new User();
          $user->nama = $request->nama;
          $user->email = $request->email;
          $user->password = $request->password;
          $user->level = $request->level;
          $res = $user->save();
          if($res){
               return back()->with('success','You have registered successfully');
          }else{
               return back()->with('fail','Something Wrong');
          }
     }


    // Handle login request
    public function loginUser(Request $request)
    {
        // Validate credentials
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $user = User::where('email','=', $request->email)->first();
          if($user){
               if(Hash::check($request->password, $user->password)) {
                    $request->session()->put('loginId', $user->id);
                    
                    // Redirect berdasarkan level user
                    switch($user->level) {
                        case 'admin':
                            return redirect()->route('admin.index');
                        case 'kurir':
                            return redirect()->route('kurir.index');
                        case 'owner':
                            return redirect()->route('owner.index');
                        default:
                            return redirect()->route('home');
                    }
               }else{
                    return back()->with('fail','Password not matches.'); 
               }
          }else{
               return back()->with('fail','This email is not registered.');
          }
    }
    // Handle logout
    public function logout(Request $request)
    {
        // Clear user session data
        $request->session()->forget('loginId');
        
        // Invalidate the session
        $request->session()->invalidate();
        
        // Regenerate CSRF token
        $request->session()->regenerateToken();
        
        // Redirect to login page instead of home
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
