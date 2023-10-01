<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'user_type',
    ];

    protected $hidden = [
        'password'
    ];

    public $timestamps = false;

    // Vous pouvez définir des relations ici, par exemple :
    // public function orders()
    // {
    //     return $this->hasMany(Order::class);
    // }
}
