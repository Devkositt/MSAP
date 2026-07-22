<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetSurrender extends Model
{
    protected $fillable = [
        'owner_name',
        'email',
        'phone',
        'address',
        'pet_name',
        'animal_type',
        'breed',
        'age_group',
        'gender',
        'is_spayed_neutered',
        'is_vaccinated',
        'health_info',
        'reason',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'is_spayed_neutered' => 'boolean',
            'is_vaccinated' => 'boolean',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
