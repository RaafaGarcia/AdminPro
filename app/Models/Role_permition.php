<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role_permition extends Model
{
    protected $fillable = [
        'role_id','permition_id','create','read','update','delete','specials'
    ];
    use HasFactory;


    public $with = ['permition','role'];

    public function permition()
    {
        return $this->belongsTo(Permition::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
