<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password' , 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function company()
    {
        return $this->hasOne(Company::class);
    }
    public function role()
    {
        return $this->hasMany(Role::class);
    }
    public function employee()
    {
        return $this->hasOne(Employees::class);
    }
    public function repository()
    {
        return $this->hasMany(Repository::class);
    }
    public function customers()
    {
        return $this->hasMany(Customers::class);
    }
    public function goods()
    {
        return $this->hasMany(Goods::class);
    }
    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

}

