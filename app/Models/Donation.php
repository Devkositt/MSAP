<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Donation extends Model { protected $fillable=['donation_channel_id','donor_name','display_name','email','phone','amount','donated_at','reference_number','slip_path','note','status','is_anonymous','reviewed_by','reviewed_at','rejection_reason']; protected function casts(): array{return ['amount'=>'decimal:2','donated_at'=>'date','reviewed_at'=>'datetime','is_anonymous'=>'boolean'];} public function channel(): BelongsTo{return $this->belongsTo(DonationChannel::class,'donation_channel_id');} public function reviewer(): BelongsTo{return $this->belongsTo(User::class,'reviewed_by');} public function publicName(): string{return $this->is_anonymous?'အမည်မဖော်လိုသူ':($this->display_name?:$this->donor_name);} }
