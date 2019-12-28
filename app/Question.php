<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    /*
     * This is for the relationship -> this means that one Question has many answers and the model will return
     * all the hasMany (answers that is related to the question)
     * you also need to establish a relationship between the Answer model to this
     */
    public function answers() {
        return $this->hasMany('App\Answer');
    }
}
