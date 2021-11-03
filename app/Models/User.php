<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'dob',
        'work_flow_engine',
        'role',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function workflows(){
        return $this->belongsTo(work_flow_engine::class, 'work_flow_engine', 'id');
    }

    public function getworkFlowAttribute(){
        return $this->workflows->name;
    }

    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }
}
