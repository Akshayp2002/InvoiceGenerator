<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    
    protected $fillable = [
        'name',
        'date',
        'email',
        'amount',
        'quantity',
        'total_amount',
        'percentage',
        'tax_amount',
        'net_amount',
        'file_path',
    ];
}
