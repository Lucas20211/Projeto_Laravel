<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'nome', 'quantidade', 'preco', 'marca_id', 'fornecedor_id'];
}
