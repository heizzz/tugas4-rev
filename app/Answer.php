<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable =['jawaban', 'id_user', 'id_question'];
}
