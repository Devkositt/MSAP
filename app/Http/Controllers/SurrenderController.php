<?php

namespace App\Http\Controllers;

use App\Models\PetSurrender;
use Illuminate\Http\Request;

class SurrenderController extends Controller
{
    public function create()
    {
        return view('surrender');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'owner_name' => 'required|string|max:120',
            'email' => 'required|email',
            'phone' => 'required|string|max:30',
            'address' => 'required|string',
            'pet_name' => 'required|string|max:100',
            'animal_type' => 'required|in:dog,cat',
            'breed' => 'nullable|string|max:100',
            'age_group' => 'nullable|in:baby,young,adult,senior',
            'gender' => 'nullable|in:male,female',
            'is_spayed_neutered' => 'nullable|boolean',
            'is_vaccinated' => 'nullable|boolean',
            'health_info' => 'nullable|string',
            'reason' => 'required|string',
        ]);

        PetSurrender::create([
            'owner_name' => $validated['owner_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'pet_name' => $validated['pet_name'],
            'animal_type' => $validated['animal_type'],
            'breed' => $validated['breed'],
            'age_group' => $validated['age_group'],
            'gender' => $validated['gender'],
            'is_spayed_neutered' => $request->has('is_spayed_neutered'),
            'is_vaccinated' => $request->has('is_vaccinated'),
            'health_info' => $validated['health_info'],
            'reason' => $validated['reason'],
            'status' => 'pending',
        ]);

        return redirect()->route('surrender.create')
            ->with('success', 'အပ်နှံလျှောက်လွှာ တင်ပြီးပါပြီ။ Admin မှ စိစစ်ပြီး ဆက်သွယ်ပေးပါမည်။');
    }
}
