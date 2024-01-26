<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['barang'];
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $incrementing = true;
    public $timestamps = true;
}
