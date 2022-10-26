<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

}