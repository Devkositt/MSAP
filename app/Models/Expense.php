<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Expense extends Model { protected $fillable=['category','title','description','amount','spent_at','receipt_path','is_published','created_by']; protected function casts(): array{return ['amount'=>'decimal:2','spent_at'=>'date','is_published'=>'boolean'];} public function creator(): BelongsTo{return $this->belongsTo(User::class,'created_by');} }
