<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ethnicity;
use App\Community;

class Person extends Model
{
    protected $guarded = [];

    public function ethnicity(){
        return $this->belongsTo(Ethnicity::class);
    }

    public function community(){
        return $this->belongsTo(Community::class);
    }

}
