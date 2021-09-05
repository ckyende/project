<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';
    public $timestamps= false;
    protected $casts = [
        'time_in' => 'time:H:i:s',
        'time_out' => 'time:H:i:s',
        
    ];
    
    protected $fillable = [
        'shift',
        'time_in',
        'time_out',
    ];

    protected $primaryKey = 'id';

    protected function serializeDate(DateTimeInterface $date)
    {
        return $time->format('H:i:s');
    }
}
