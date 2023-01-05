<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;

class Test extends Model
{
    use HasFactory;
    protected $table="tests";
    protected $guarded = [];
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
        return $this->belongsToMany(Language::class,'test_languages','test_id','language_id');
    }
}
