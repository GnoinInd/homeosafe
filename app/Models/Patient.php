<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
   protected $fillable = ['name','phone','email','refered_by','gender','description','shift','is_read','date'];

    public function referringDoctor()
    {
        return $this->belongsTo(Doctor::class, 'refered_by');
    }
}
