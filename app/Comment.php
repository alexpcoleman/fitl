<?php

namespace App;

use \Esensi\Model\Model;

class Comment extends Model
{
    protected $rules = [
    	'question_id' => ['required'],
    	'comment' => ['required']
    ];
}
