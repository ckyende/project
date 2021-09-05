<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labour extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'labours';
    
    protected $casts = [
        'request_date' => 'datetime',
      
    ];

    protected $dates = [
        'request_date',
        
    ];
    
    protected $fillable = [
        'turnmen',
        'bob_cat_operator',
        'bulk_loader',
        'trimming_gang',
        'cargil_clerk',
        'request_date',
    ];

    public function sum()
    {
        //
    }
    
    protected $primaryKey = 'id';

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    //protected $dateFormat = 'U';
    //public $timestamps= false;
    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
