<?php

namespace App;

use \Esensi\Model\Model;

class Role extends Model
{
	protected $rules = [
		'name' => ['required']
	];

	public function users()
	{
		return $this->belongsToMany('App\User', 'users_roles');
	}

}