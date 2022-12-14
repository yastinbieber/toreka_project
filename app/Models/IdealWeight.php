<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealWeight extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function weightRecords() {
        return $this->hasMany(WeightRecord::class);
    }

    public function userMotivations() {
        return $this->hasMany(UserMotivation::class);
    }
}
