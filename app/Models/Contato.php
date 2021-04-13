<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends model
{
	use SoftDeletes;
	
	protected $table = 'contatos';
    protected $fillable = ['nome', 'telefone', 'email', 'tipotelef', 'data_nasc', 'image'];
    protected $dates = ['deleted_at'];
}