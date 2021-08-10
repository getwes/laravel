<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class episodio extends Model
{
   public function temporada ()
   {
       return $this->belongto(temporada::class);
   }
}
