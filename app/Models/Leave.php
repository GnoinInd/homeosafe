<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $fillable = ['name','doctor_id','date','shift'];

    // public function Doctor()
    // {
    //     return $this->belongsTo(Doctor::class, 'doctor_id');
    // }
}
