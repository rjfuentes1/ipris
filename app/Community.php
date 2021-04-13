<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Person;

class Community extends Model
{
    protected $guarded = [];

    public function people(){
        return $this->hasMany(Person::class);
    }
}
