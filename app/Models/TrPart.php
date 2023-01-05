<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPart extends Model
{
    use HasFactory;
    protected $fillable = ['part_name'];

    public function trRecord() {
        return $this->belongsTo(TrRecord::class);
    }

    public function trMenus() {
        return $this->hasMany(TrMenu::class);
    }
}
