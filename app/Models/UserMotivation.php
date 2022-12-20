<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMotivation extends Model
{
    use HasFactory;
    protected $fillable = ['training_frequency','purpose', 'ideal_weight_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function idealWeight() {
        return $this->belongsTo(IdealWeight::class);
    }
}
