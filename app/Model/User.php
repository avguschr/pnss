<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'login',
        'password',
        'role',
        'birthday'
    ];

    public function isAdmin()
    {
        if($this->role === 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isDoctor()
    {
        if($this->role === 3)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function isPatient()
    {
        if($this->role === 2)
        {
            return true;
        }
        else
        {
            return false;
        }
    }



    protected static function booted()
    {
        static::created(function ($user) {
            $user->password = md5($user->password);
            $user->save();
            if ($user->role === 2) {
                $patient = new Patient;
                $patient->id = $user->id;
                $patient->save();
            }
//            if ($user->role === 3) {
//                $doctor = new Doctor;
//                $doctor->id = $user->id;
//            }
        });
    }

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        return self::where(['login' => $credentials['login'],
            'password' => md5($credentials['password'])])->first();
    }



}

