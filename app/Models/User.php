<?php

namespace App\Models;

use App\Traits\HasCan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable 
{
    use HasApiTokens;
    use HasFactory;

    use Notifiable;

    use HasCan;
    use SoftDeletes;
    // use MustVerifyEmail;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $with = ['role'];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'can',
    ];

    public function getCreatedAtAttribute($value)
    {
        return now()->parse($value)->timezone(config('app.timezone'))->format('d F Y, H:i:s');
    }

    public function getUpdatedAtAttribute($value)
    {
        return now()->parse($value)->timezone(config('app.timezone'))->diffForHumans();
    }

    public function hasPermition($permitionName)
    {
        $permition = Permition::where('name', $permitionName)->first();

        if (empty($permition)) {
            return false;
        }

        $role_permition = Role_permition::with(['permition', 'role'])->where('role_id', $this->role_id)
            ->where('permition_id', $permition->id)
            ->first();

        if (empty($role_permition)) {
            return false;
        }

        return $role_permition;
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function hasRole($role)
    {
        $roleUser = Role::where('id',$this->role_id)->where('name',$role)->first();

        if (empty($roleUser)) {
            return false;
        }else{
            return true;
        }
        
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        });
    }
}
