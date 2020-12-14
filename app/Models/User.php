<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id'
    ];

    public function phone() {
        return $this->hasOne(Phone::class);
    }
    
    /*
    //Does not play nice with the factory
    public function getPhoneAttribute($model_name) {
        return $this->hasOne(Phone::class);
    }

    public function setPhoneAttribute($model_name) {
        switch($model_name) {
            case 'Samsung': 
                $price = 5000;
                break;
            case 'Apple': 
                $price = 9999;
                break;
            default: 
                $price = 4000;
        }

        Phone::updateOrCreate(['user_id' => $this->id], ['model' => $model_name, 'price' => $price]);
    }
    */
}
