<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IdealWeight extends Model
{
    use HasFactory;
    protected $fillable = ['height','weight','target_weight', 'exercise_level', 'period', 'basal_metabolism', 'calories_burned', 'minus_weight', 'minus_calories', 'calories_intake', 'protein_gram_intake', 'protein_calories_intake', 'fat_gram_intake', 'fat_calories_intake', 'carbo_gram_intake', 'carbo_calories_intake', 'start_day', 'last_day', 'minus_weight_day'];

    public static function boot()
    {
        parent::boot();
        self::saving(function (IdealWeight $idealWeight) {
            // ボディメイク期間
            $idealWeight->period = Carbon::create($idealWeight->last_day)->diffInDays(Carbon::create($idealWeight->start_day));
            // 基礎代謝
            if (Auth::user()->gender === "男") {
                $idealWeight->basal_metabolism = 13.397*($idealWeight->weight)+4.799*($idealWeight->height)-5.677*(Auth::user()->age)+88.362; #男性の場合
            } else {
                $idealWeight->basal_metabolism = 9.247*($idealWeight->weight)+3.098*($idealWeight->height)-4.33*(Auth::user()->age)+447.593; #女性の場合
            }
            // 消費カロリー
            $idealWeight->calories_burned = ($idealWeight->basal_metabolism)*($idealWeight->exercise_level);
            // 何キロ落とすか
            $idealWeight->minus_weight = ($idealWeight->weight)-($idealWeight->target_weight);
            // 何キロカロリー落とすか
            $idealWeight->minus_calories = ($idealWeight->minus_weight)*7200;
            // 1日あたり何キロ落とせば良いか
            $idealWeight->minus_weight_day = ($idealWeight->minus_weight)/($idealWeight->period);
            // 1日あたり何キロカロリー摂取すればいいか
            $idealWeight->calories_intake = ($idealWeight->calories_burned)-($idealWeight->minus_calories)/($idealWeight->period);
            // タンパク質摂取量(g)
            if ($idealWeight->exercise_level === '1.9') {
                $idealWeight->protein_gram_intake = ($idealWeight->weight) * 2;
            } elseif ($idealWeight->exercise_level === '1.73') {
                $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1.8;
            } elseif ($idealWeight->exercise_level === '1.55') {
                $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1.4;
            } elseif ($idealWeight->exercise_level === '1.38') {
                $idealWeight->protein_gram_intake = ($idealWeight->weight) * 1;
            } elseif ($idealWeight->exercise_level === '1.2') {
                $idealWeight->protein_gram_intake = ($idealWeight->weight) * 0.8;
            }
            // タンパク質摂取カロリー(g*4g)
            $idealWeight->protein_calories_intake = ($idealWeight->protein_gram_intake)*4;
            // 脂質摂取カロリー
            $idealWeight->fat_calories_intake = ($idealWeight->calories_intake)*0.2;
            // 脂質摂取量(g)
            $idealWeight->fat_gram_intake = ($idealWeight->fat_calories_intake)/9;
            // 炭水化物摂取カロリー
            $idealWeight->carbo_calories_intake = ($idealWeight->calories_intake)-($idealWeight->protein_calories_intake)-($idealWeight->fat_calories_intake);
            // 炭水化物摂取量(g)
            $idealWeight->carbo_gram_intake = ($idealWeight->carbo_calories_intake)/4;
        });
    }

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
