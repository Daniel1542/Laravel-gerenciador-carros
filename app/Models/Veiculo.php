<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $table = 'veiculos';
    protected $fillable = [
        'proprietario_id',
        'modelo',
        'marca',
        'placa',
    ];

    public function revisoes()
    {
        return $this->hasMany(Revisao::class);
    }

    public function proprietario()
    {
        return $this->belongsTo(Proprietario::class);
    }
}
