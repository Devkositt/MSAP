<?php

namespace App\Http\Controllers;

use App\Models\AdoptionApplication;
use App\Models\Pet;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    public function store(Request $request, Pet $pet)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email',
            'phone' => 'required|string|max:30',
            'address' => 'required|string',
            'experience' => 'nullable|string',
            'other_pets' => 'nullable|string',
            'reason' => 'required|string',
        ]);

        AdoptionApplication::create([
            'pet_id' => $pet->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'experience' => $validated['experience'],
            'other_pets' => $validated['other_pets'],
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        return redirect()->route('pets.show', $pet)
            ->with('success', 'မွေးစားလျှောက်လွှာ တင်ပြီးပါပြီ။ Admin မှ စိစစ်ပြီး ဆက်သွယ်ပေးပါမည်။');
    }
}
