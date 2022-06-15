<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatisticAplly extends Model
{
    use HasFactory;
    protected $date=[
        'created_at',
        'updated_at'
    ];

    protected $fillable=[
        'recruitment_id','quantity_apply','quantity_browsing','date_apply','created_at','updated_at'
    ];

    protected $primaryKey='id';
    protected  $table='statisticapply';

    public function recruitment(){
        return $this->hasMany(Recruitment::class,'id','recruitment_id');
    }
}
