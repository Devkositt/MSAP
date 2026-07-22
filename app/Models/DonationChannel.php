<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class DonationChannel extends Model { protected $fillable=['provider','account_name','account_number','qr_path','sort_order','is_active']; protected function casts(): array{return ['is_active'=>'boolean'];} public function donations(): HasMany{return $this->hasMany(Donation::class);} }
