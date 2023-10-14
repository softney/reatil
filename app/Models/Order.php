<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'date_order', 'quantity', 'states', 'client_id', 'product_id'];

    public const STATUS = ['Pendiente', 'Entregado'];
}
