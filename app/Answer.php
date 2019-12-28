<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /*
     * This is for the relationship -> This means that the answer(s) belongs to a certain question
    */

    public function question()
    {
        return $this->belongsTo('App\Question');
    }
}
