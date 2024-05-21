<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revisao extends Model
{
    use HasFactory;
    protected $table = 'revisoes';
    protected $fillable = [
        'veiculo_id',
        'data',
        'tempo'
    ];

    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }
}
