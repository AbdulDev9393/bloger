<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeveloperRegisterRequest;
use App\Models\Developer;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeveloperController extends Controller
{
    public function index()
    {
        $developers = Developer::all();
        return view('admin_panal.developers.index', compact('developers'));
    }

    public function store(DeveloperRegisterRequest $request)
    {
        $request->validated();
        $developer = Developer::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'created_by' => auth()->id()
        ]);
        if ($developer) {
            return redirect()->route('admin.developers.index')->with('success', 'User Created Successfully');
        } else {
            return redirect()->route('admin.developers.index')->with('error', 'User Creation Failed!');
        }
    }
}
