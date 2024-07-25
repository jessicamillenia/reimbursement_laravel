<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reimbursement;

class ReimburseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reimbursements = Reimbursement::with('user')->get();
        return view('reimburse.index', compact('reimbursements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reimburse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userId = auth()->id();
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'deskripsi' => 'required',
            'nama_reimbursement' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048', // File validation
        ]);
        $validatedData['user_id'] = $userId;

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('uploads', 'public');
            $validatedData['file_path'] = $path;
        }

        Reimbursement::create($validatedData);

        return redirect()->route('reimburse.index');
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

    public function reject(string $id)
    {
        $reimburse = Reimbursement::findOrFail($id);
        $reimburse->status = "rejected";
        $reimburse->save();

        session(['notif' => 'Reimburse rejected.']);
        return redirect()->route('reimburse.index');
    }

    public function approve(string $id)
    {
        $reimburse = Reimbursement::findOrFail($id);
        $reimburse->status = "approved";
        $reimburse->save();

        session(['notif' => 'Reimburse approved.']);
        return redirect()->route('reimburse.index');
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
