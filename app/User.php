<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'password', 'last_login_at', 'last_login_ip', 'status'
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

    protected function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d-m-Y H:i:s');
    }

    protected function getLastLoginAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['last_login_at'])
            ->format('d-m-Y H:i:s');
    }

    public function getEmailAttribute()
    {
        return  $this->attributes['email'] ?? '<p class="text-muted">none</p>';
    }

    protected $appends = ['roles_origin'];

    public function getRolesOriginAttribute() {
        return $this->relations['permissions']->pluck('name');
   }

 
    

 

   
}
