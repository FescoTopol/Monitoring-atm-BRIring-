<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $dates = ['created_at'];
    protected $guarded = [];

    public function jabatan(){
        return $this->belongsTo(Jabatan::class);
    }
    public function uker(){
        return $this->belongsTo(Uker::class);
    }
    public function tid(){
        return $this->belongsTo(TerminalId::class);
    }
}
