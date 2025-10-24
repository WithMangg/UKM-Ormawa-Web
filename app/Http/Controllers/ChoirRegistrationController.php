<?php

namespace App\Http\Controllers;

use App\Models\ChoirRegistration;
use Illuminate\Http\Request;

class ChoirRegistrationController extends Controller
{
    public function index()
    {
        $registrations = ChoirRegistration::all();
        return response()->json($registrations);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'nim' => 'required|string|max:20|unique:registrations,nim',
            'email' => 'required|email|unique:registrations,email',
            'phone' => 'nullable|string',
            'study_program' => 'required|string',
            'entry_year' => 'required|digits:4|integer',
            'gender' => 'required|in:Male,Female',
            'reason' => 'required|string',
            'photo' => 'nullable|string',
        ]);

        $registration = ChoirRegistration::create($validated);

        // return redirect()->route('/recruitment')->with('success', 'Berhasil mendaftar.');
        return redirect()->route('recruitment')->with('success', 'Berhasil mendaftar.');

        // return response()->json($registration, 201);
    }

    public function show($id)
    {
        $registration = ChoirRegistration::find($id);
        if (!$registration) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json($registration);
    }
}
