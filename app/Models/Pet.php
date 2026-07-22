<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\{HasMany,HasOne};
class Pet extends Model { use SoftDeletes; protected $fillable=['name','slug','animal_type','breed','date_of_birth','age_group','gender','status','is_spayed_neutered','is_vaccinated','health_info','description','is_published']; protected function casts(): array{return ['date_of_birth'=>'date','is_spayed_neutered'=>'boolean','is_vaccinated'=>'boolean','is_published'=>'boolean'];} public function images(): HasMany{return $this->hasMany(PetImage::class)->orderBy('sort_order');} public function primaryImage(): HasOne{return $this->hasOne(PetImage::class)->where('is_primary',true)->oldestOfMany();} public function getRouteKeyName(): string{return 'slug';} }
