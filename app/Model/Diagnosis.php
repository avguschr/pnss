<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }
}
