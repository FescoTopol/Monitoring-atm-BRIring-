<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keamanan extends Model
{
    use HasFactory;
    protected $table = 'keamanan';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $created = ['created_at'];
}
