<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function diagnosis()
    {
        return $this->belongsToMany(Diagnosis::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'id');
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
}