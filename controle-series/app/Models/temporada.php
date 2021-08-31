<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temporada extends Model
{
    protected $fillable = ['numero'];
    public$timestamps = false;
    public function episodios()
    {
        return $this->hasmany(episodio::class);
    }

   public function series()
{
    return $this->belongsto(series::class);
}
 
}

