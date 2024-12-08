<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tasks';
    protected $fillable = ['name', 'description', 'status'];
}
