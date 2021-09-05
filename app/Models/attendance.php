<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon;

class attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances';
    public $timestamps= false;

    protected $fillable = [

        //'created_at',
        'national_id',
        'name',
        'designation',
        'location',
        //'time_in',
        //'time_out',
    ];
    
    
}
