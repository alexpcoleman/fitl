<?php

namespace App;

use \Esensi\Model\Model;

class Language extends Model
{
		protected $rules = [
			'name' => ['required']
		];

    public function questions() {
    	return $this->belongsToMany('App\Question', 'questions_languages');
    }
}
