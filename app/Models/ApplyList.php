<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyList extends Model
{
    use HasFactory;

    protected $date=[
        'created_at',
        'updated_at'
    ];

    public $timestamps=false;
    protected $fillable=[
        'recruitment_id','user_id','name','email','phone_number','linkCV','status','created_at','updated_at'
    ];

    protected $primaryKey='id';
    protected  $table='apply_list';

    public function recruitment(){
        return $this->hasOne(Recruitment::class,'id','recruitment_id');
    }

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
