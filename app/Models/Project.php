<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
class Project extends Model
{
    use HasFactory;
    protected $table="projects";
    protected $guarded = [];

    // protected $fillable =['name', 'clas','address','language', 'country_id', 'state_id','dob','gender','text'];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id');
    }

    public function language()
    {
        return $this->belongsToMany(Language::class,'project_languages','project_id','language_id');
    }

}
