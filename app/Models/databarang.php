<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class databarang extends Model
{
    use HasFactory;
    protected $table = "databarang";
    protected $fillable = ['sku', 'nm_barang', 'varian'];
    public $timestamps = false;
}