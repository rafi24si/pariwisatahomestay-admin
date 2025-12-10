<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // LIST USER + SEARCH + FILTER + PAGINATION
    public function index(Request $request)
    {
        $query = User::query();

        // Search
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // Filter role
        if ($request->role && $request->role !== 'all') {
            $query->where('role', $request->role);
        }

        // Pagination
        $users = $query->orderBy('id', 'DESC')->paginate(10)->withQueryString();

        return view('users.index', compact('users'));
    }

    // FORM CREATE
    public function create()
    {
        return view('users.create');
    }

    // STORE (CREATE USER)
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,petugas',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // UPDATE USER
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'role'  => 'required|in:admin,petugas',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ];

        // Update password jika diisi
        if ($request->password) {
            $request->validate(['password' => 'min:6']);
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    // DELETE
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }

    // AJAX: CHECK EMAIL DUPLICATE
    public function checkEmail(Request $request)
    {
        $exists = User::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }
}
