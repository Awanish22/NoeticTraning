<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
class Student extends Model
{
    protected $table="students";
    // protected $table = 'cities';
    protected $guarded = [];
    // protected $fillable = [
    //     'fname','lname','clas','city','state','zip' ,''
    // ];
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }
}
