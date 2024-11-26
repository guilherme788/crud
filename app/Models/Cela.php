<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cela extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'capacidade',
        'descricao',
    ];

    public function presos()
    {
        return $this->hasMany(Preso::class);
        return $this->hasMany(Preso::class);

    }
}
