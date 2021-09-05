<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    use HasFactory;
    protected $table = 'locations';

    protected $primaryKey = 'id';
    public $timestamps= false;
    
    protected $fillable = [
        //'id',
        'location_name',
    ];
    protected $casts = [

       // 'deleted_at',
       // 'loaction_name' => 'string',
    ];

   // protected function serializeDate(DateTimeInterface $date)
    //{
       // return $date->format('Y-m-d H:i:s');
   // }
}
