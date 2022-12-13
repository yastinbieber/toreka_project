<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrRecord extends Model
{
    use HasFactory;
    protected $fillable = ['tr_date','part','menu', 'set_type', 'weight_first', 'reps_first', 'weight_second', 'reps_second', 'weight_third', 'reps_third', 'weight_fourth', 'reps_fourth', 'weight_fifth', 'reps_fifth', 'memo'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function trPart() {
        return $this->hasOne(TrPart::class);
    }

    public function trSettype() {
        return $this->hasOne(TrSettype::class);
    }

}
