<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory;

    protected $date=[
        'created_at',
        'updated_at'
    ];

    public $timestamps=false;
    protected $fillable=[
        'user_id',
        'title',
        'position',
        'position_type',
        'level',
        'kills',
        'experience',
        'quantity',
        'salary_min',
        'salary_max',
        'expire',
        'job_description',
        'job_requirements',
        'benefit',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $primaryKey='id';
    protected  $table='recruitment';

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
