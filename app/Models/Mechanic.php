<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function owner()
    {
        return $this->hasOneThrough(Owner::class, Car::class,'mechanic_id','car_id');
    }
}
