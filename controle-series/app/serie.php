<?php

namespace app;

use Illuminate\database\eloquent\Model;

class Serie extends Model 
{
    protected $table = 'serie';
    public $timestamps = false;
    protected $fillable = [
      "nome"
    ];
}