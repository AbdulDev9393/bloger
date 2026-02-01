<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;

class DeveloperController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin_panal.developers.index', compact('users'));
    }

    public function store(StoreDeveloperRequest $request)
    {
        $request->validated();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'created_by' => auth()->id()
        ]);
        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'user' => $user
            ]);
        }
        return redirect()->route('admin.developers.index')->with('success', 'User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user); // Return JSON for AJAX
    }

    public function update(UpdateDeveloperRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->only(['name', 'email', 'role']);
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);

        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'message' => 'Developer updated successfully',
                'user' => $user
            ]);
        }

        return redirect()->back()->with('success', 'Developer updated successfully');
    }


    public function delete($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->delete();
        if ($request->ajax()) {
            return response()->json(['status' => true, 'message' => 'Developer deleted successfully']);
        }
        return redirect()->back()->with('success', 'Developer deleted successfully');
    }
}
