<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\State;
use App\Models\Student;
class Country extends Model
{
    use HasFactory;
    protected $fillable=['name','country_id'];

    // public function state()
    // {
    //     return $this->belongsToMany(State::class);
    // }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function cities()
    {
        return $this->hasManyThrough(City::class, State::class,);
    }

    public function student()
    {
        return $this->hasMany(Student::class,'country_id');
    }
}
