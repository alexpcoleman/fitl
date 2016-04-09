<?php

namespace App;

use \Esensi\Model\Model;

use Auth;

class Comment extends Model
{
  protected $rules = [
  	'question_id' => ['required'],
  	'comment' => ['required']
  ];

  public function user() {
		return $this->belongsTo('App\User');
	}

	public function question()
	{
		return $this->belongsTo('App\Question');
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
