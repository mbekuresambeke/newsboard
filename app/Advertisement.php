<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['subject', 'category', 'publish_date', 'detail', 'user_id','status'];


    public function attachments(){

        return $this->hasMany(Attachment::class);

    }
}
