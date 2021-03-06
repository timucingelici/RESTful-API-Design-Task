<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * Timestamps
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->hasOne('App\Models\Role', 'id', 'roleId');
    }

    public function orders() {
        return $this->hasMany('App\Models\Order', 'userId', 'id');
    }

    public function getByRole($role) {
        return $this->hasOne('App\Models\Role', 'id', 'roleId')->where('role', $role);
    }

    public function whoIs($role){

    }
}
