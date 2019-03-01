<?php

namespace App\Models;

use IDevCode\Models\ActiveModel;

class User extends ActiveModel
{
    protected $primaryKey = 'pid';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pid',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
