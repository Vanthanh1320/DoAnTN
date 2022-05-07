<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'profile_id','name_company','start_time','end_time','job_position','job_details'
    ];

    protected $primaryKey='id';
    protected  $table='experience';

    public function profile(){
        return $this->hasOne(Profile::class,'id','profile_id');
    }
}
