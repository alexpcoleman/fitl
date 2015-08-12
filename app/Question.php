<?php

namespace App;

use \Esensi\Model\Model;

class Question extends Model
{
	protected $rules = [
		'title' => ['required'],
		'description' => ['required'],
	];	
}