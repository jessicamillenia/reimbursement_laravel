<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('account.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validJabatan= ['Direktur', 'Staff', 'Finance'];
        $validatedData = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required|string|in:' . implode(',', $validJabatan),
            'password' => 'required',
        ]);
        $isExistUser = User::where('nip', $request->input('nip'))->first();
        if ($isExistUser) {
            session(['notif' => 'Nip is Exist.']);
            return back()->withInput();
        }
        $user = User::create($validatedData);
        if ($user) {
            session(['notif' => 'Success create account.']);
            return redirect()->route('account.index');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('account.index', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('account.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validJabatan= ['Direktur', 'Staff', 'Finance'];
        $validatedData = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'jabatan' => 'required|string|in:' . implode(',', $validJabatan),
            'password' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        session(['notif' => 'Account updated.']);
        return redirect()->route('account.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session(['notif' => 'Account deleted.']);
        return redirect()->route('account.index');
    }
}
