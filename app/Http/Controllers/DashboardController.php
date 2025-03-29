<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if session exists
        if(!session()->has('loginId')) {
            return redirect()->route('login')->with('fail', 'Please login first!');
        }

        // Get user data
        $user = User::find(session('loginId'));
        
        // Check if user exists
        if(!$user) {
            return redirect()->route('login')->with('fail', 'User not found!');
        }

        switch ($user->level) {
            case 'admin':
                return view('admin.index', [
                    'userName' => $user->nama,
                    'title' => 'Dashboard Admin'
                ]);
            case 'kurir':
                return view('kurir.index', [
                    'userName' => $user->nama,
                    'title' => 'Dashboard Kurir'
                ]);
            case 'owner':
                return view('owner.index', [
                    'userName' => $user->nama,
                    'title' => 'Dashboard Owner'
                ]);
            default:
                return redirect()->route('home');
        }
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
