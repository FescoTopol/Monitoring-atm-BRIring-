<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uker extends Model
{
    use HasFactory;
    protected $table = "uker";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'uker'];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
