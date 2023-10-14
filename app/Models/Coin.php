<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'value', 'image'];

    public const TYPE = ['Billetes', 'Monedas', 'Otros'];
}
