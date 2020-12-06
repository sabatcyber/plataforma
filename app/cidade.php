<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cidade extends Model
{
   protected $fillable = ['cidade', 'estado_id'];

    public $timestamps = false;

    public function estado()
    {
        return $this->belongsTo('App\Estado');
    }
}
