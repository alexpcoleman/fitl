<?php

namespace App;

use \Esensi\Model\Model;

use Auth;

class Question extends Model
{
	protected $rules = [
		'title' => ['required'],
		'description' => ['required'],
	];

	// access comments using, e.g., $question->comments
	public function comments() {
		return $this->hasMany('App\Comment')->orderBy('created_at', 'desc');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function languages() {
		return $this->belongsToMany('App\Language', 'questions_languages');
	}

	public function canEdit()
	{
		if ( ! Auth::check() ) {
			return false;
		}

		// if this is the active user's object,
		// they CAN edit it!
		if ( Auth::user()->id === $this->user_id ) {
			return true;
		}

		// by default, can't edit
		return false;
	}

}