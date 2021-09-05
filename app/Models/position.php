<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use HasFactory;
    
    protected $table = 'positions';
    protected $casts = [
        'normal_rate'    => 'float',
        'overtime_rate'  => 'float',
        'holiday_rate'   => 'float',
        'ppe_cost'       => 'float',
        'management_fee' => 'float',
        
    ];
    
    protected $fillable = [
        'position_name',
        'normal_rate',
        'overtime_rate',
        'holiday_rate',
        'ppe_cost',
        'management_fee',
    ];

    public $timestamps= false;
}
