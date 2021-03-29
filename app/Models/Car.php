<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['mark','model','color','year','type','fuel','registration_no','passenger_seats','vin','gear_box','car_properties'];

    //protected $guarded = [];
}
