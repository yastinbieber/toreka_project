<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrSettype extends Model
{
    use HasFactory;

    public function trRecord() {
        return $this->hasOne(TrRecord::class);
    }
}
