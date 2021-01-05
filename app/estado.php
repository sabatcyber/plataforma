<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
   protected $fillable = ['id','estado'];

    public $timestamps = false;

    public function cidades()
    {
        return $this->hasMany('App\Cidade');
    }
}
