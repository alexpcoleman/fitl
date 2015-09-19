<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function questions() {
    	return $this->belongsToMany('App\Question', 'questions_languages');
    }
}
