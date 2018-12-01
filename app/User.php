<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'username');
    }
    public function staff_monitoring()
    {
        return $this->belongsTo(StaffMonitoring::class, 'user_id');
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function authorizeRoles($roles)
    {
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401, 'Esta acción no está autorizadaaa.');
    }
    
    public function hasAnyRole($admin, $user, $contador, $busetero)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($admin, $mantenimiento)
    {
        if ($this->role()->where('Admin', $admin)->first()) {
            
            return true;
        }elseif ($this->role()->where('Mantenimiento', $mantenimiento)->first()) {
            return true;
        }
        return false;
    }
    public function hasRole2($personal, $inventario)
    {
        if ($this->role()->where('Personal', $personal)->first()) {
            return true;
        }elseif ($this->role()->where('Inventario', $inventario)->first()) {
            return true;
        }
        return false;
    }
    public function hasRole3($operaciones)
    {
        if ($this->role()->where('Operaciones', $operaciones)->first()) {
            return true;
        }
        return false;
    }
}


