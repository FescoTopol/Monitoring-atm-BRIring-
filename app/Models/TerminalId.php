<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminalId extends Model
{
    use HasFactory;
    protected $table = "terminal_id";
    protected $primaryKey = "id";
    protected $fillable = ['id','tid'];

    public function pegawai(){
        return $this->hasMany(Pegawai::class);
    }
}
