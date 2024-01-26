<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Kategori.php (Model)
    protected $fillable = ['kategori'];

    protected $table = 'kategoris';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $incrementing = true;
    public $timestamps = true;
}
