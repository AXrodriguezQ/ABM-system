<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory;

    // We bring the table from the database.
    protected $table = 'users';

    // We bring all the properties that can be manipulated.
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'password',
        'created_by',
        'is_restricted',
    ];

    // Method required by JWTSubject.
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // Method required by JWTSubject.
    public function getJWTCustomClaims()
    {
        return [];
    }
}
