<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelengkapan extends Model
{
    use HasFactory;
    protected $table = 'kelengkapan';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $created = ['created_at'];
    // protected $updated = ['updated_at'];
}
