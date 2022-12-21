<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightRecord extends Model
{
    use HasFactory;
    protected $fillable = ['today_weight', 'body_fat_percentage', 'date', 'expected_weight'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function idealWeight() {
        return $this->belongsTo(IdealWeight::class);
    }
}
