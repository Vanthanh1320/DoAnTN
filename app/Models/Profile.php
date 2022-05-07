<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $date=[
        'created_at',
        'updated_at'
    ];

    public $timestamps=false;
    protected $fillable=[
        'user_id','title','image','name','email','phone_number','male','dateOfBirth','address','position','introduce','created_at','updated_at'
    ];

    protected $primaryKey='id';
    protected  $table='profiles';

    public function experience(){
        return $this->hasMany(Experience::class,'profile_id','id');
    }

    public function education(){
        return $this->hasMany(Experience::class,'profile_id','id');
    }

    public function project(){
        return $this->hasMany(Experience::class,'profile_id','id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
