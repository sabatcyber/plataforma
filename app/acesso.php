<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class acesso extends Model
{
    protected $fillable = ['nome', 'fila','nivel_acesso'];
}
