<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
class State extends Model
{
    use HasFactory;
    protected $fillable=['country_id','name'];


    // public function country()
    // {
    //     return $this->belongsToMany(Country::class);
    // }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function student()
    {
        return $this->hasMany(Student::class,'state_id');
    }
}
