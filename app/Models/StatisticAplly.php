<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatisticAplly extends Model
{
    use HasFactory;
    protected $fillable=[
        'recruitment_id','quantity_apply','quantity_browsing','date_apply'
    ];

    protected $primaryKey='id';
    protected  $table='statisticapply';

}
