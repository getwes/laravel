<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episodio extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;
   public function temporada ()
   {
       return $this->belongto(Temporada::class);
   }
}
