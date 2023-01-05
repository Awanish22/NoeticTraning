<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
class Resource extends Model
{
    protected $table="resources";
    protected $guarded = [];
    use HasFactory;

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
        return $this->belongsToMany(Language::class,'resource_languages','resource_id','language_id');
    }
}
