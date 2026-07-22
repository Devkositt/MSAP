<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PetImage extends Model { protected $fillable=['path','alt_text','sort_order','is_primary']; protected function casts(): array{return ['is_primary'=>'boolean'];} public function pet(): BelongsTo{return $this->belongsTo(Pet::class);} }
