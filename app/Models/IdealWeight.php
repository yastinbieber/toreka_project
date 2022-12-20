<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealWeight extends Model
{
    use HasFactory;
    protected $fillable = ['height','weight','target_weight', 'exercise_level', 'period', 'basal_metabolism', 'calories_burned', 'minus_weight', 'minus_calories', 'calories_intake', 'protein_gram_intake', 'protein_calories_intake', 'fat_gram_intake', 'fat_calories_intake', 'carbo_gram_intake', 'carbo_calories_intake', 'start_day', 'last_day', 'minus_weight_day'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function weightRecords() {
        return $this->hasMany(WeightRecord::class);
    }

    public function userMotivation() {
        return $this->hasOne(UserMotivation::class);
    }
}
