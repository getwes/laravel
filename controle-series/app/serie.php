<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model 
{
    //protected $table = 'serie';
    public $timestamps = false;
   // protected $fillable = [
     // "nome"
   // ];
   protected $fillable = ['nome'];

   public function temporadas ()
   {
     return $this->hasmany(temporada::class);

   }
}