<?php

namespace App;


abstract class Model extends \Illuminate\Database\Eloquent\Model
{
    protected function updateTimestamps()
    {
        
        parent::updateTimestamps();
    }

    public function createdUser()
    {
        return $this->belongsTo('App\User', null, 'created_user_id');
    }
}
