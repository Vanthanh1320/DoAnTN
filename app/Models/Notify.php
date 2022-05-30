<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;

    public $timestamps=false;
    protected $fillable=[
        'type','notifiable_type','nnotifiable_id','data','read_at','created_at','updated_at'
    ];

    protected $primaryKey='id';
    protected  $table='notifications';
}
