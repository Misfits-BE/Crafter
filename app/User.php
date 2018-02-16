<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Het gebruiker model voor de databank. 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   2018 Tim Joosten
 * @package     App
 */
class User extends Authenticatable implements BannableContract
{
    use Notifiable, HasRoles, Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Indicatie functie om te bepalen dat de gebruiker online is of niet. 
     * 
     * @return bool
     */
    public function isOnline(): bool 
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
