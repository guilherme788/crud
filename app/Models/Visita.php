<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Visita extends Model
{
    protected $fillable = [
        'preso_id', 'visitante_id', 'data_visita',
    ];

    protected $casts = [
        'data_visita' => 'datetime',
    ];

    public function preso()
    {
        return $this->belongsTo(Preso::class);
    }

    public function visitante()
    {
        return $this->belongsTo(Visitante::class);
    }
}
