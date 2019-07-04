<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $table = 'pesertas';
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function votes ()
    {
    	return $this->belongsToMany('App\Vote', 'namatable ini', 'id ini', 'id di vote');
    }
    
}
