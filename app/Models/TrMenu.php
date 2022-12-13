<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrMenu extends Model
{
    use HasFactory;
    protected $fillable = ['menu'];

    public function trPart() {
        return $this->belongsTo(TrPart::class);
    }
}
