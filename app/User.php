<?php

namespace App;

use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            'name',
            'email',
            'password',
        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden
        = [
            'password',
            'remember_token',
        ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts
        = [
            'email_verified_at' => 'datetime',
        ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles');
    }

    public static function isAdmin()
    {

        foreach (Auth::user()->roles as $role) {
            if ($role->name == 'Admin') {
                return true;
            }
        }
        return false;

    }

    public function routeNotificationForSlack() {
        return env('SLACK_WEBHOOK_URL');
    }

    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }
}
