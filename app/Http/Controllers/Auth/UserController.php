<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::get();
        return view('auth.user.index',$data);
    }

    public function create()
    {

        return view('auth.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'role' => 'required'
        ]);

        $validated['password'] = Hash::make($request->username);

        User::create($validated);

        toast('User berhasil dibuat!','success');
        return redirect('user');
    }

    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('auth.user.edit',$data);
    }

    public function update(User $user, Request $request)
    {
        $rules = [
            'name' => 'required',
            'role' => 'required',
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($user->id),
            ],
        ];
    
        // Tambahkan aturan validasi untuk password jika diubah
        if ($request->filled('password')) {
            $rules['password'] = 'required';
        }
    
        $validatedData = $request->validate($rules);
    
        // Update hanya field yang diubah
        $user->update(array_filter([
            'name' => $validatedData['name'],
            'password' => $request->filled('password') ? bcrypt($validatedData['password']) : null,
            'role' => $validatedData['role'],
            'username' => $validatedData['username'],
        ]));
    
        toast('User berhasil diperbarui!', 'success');
        return back();
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        toast('User berhasil dihapus!', 'success');
        return redirect('user');
    }
}
