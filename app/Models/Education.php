<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'profile_id','name_school','start_year','end_year','degree'
    ];

    protected $primaryKey='id';
    protected  $table='education';

    public function profile(){
        return $this->hasOne(Profile::class,'id','profile_id');
    }
}
