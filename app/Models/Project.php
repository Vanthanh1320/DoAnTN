<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'profile_id','name_project','time_project','introduce_pro'
    ];

    protected $primaryKey='id';
    protected  $table='project';

    public function profile(){
        return $this->hasOne(Profile::class,'id','profile_id');
    }
}
