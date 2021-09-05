<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Holiday extends Model
{
    use HasFactory;
    protected $table = 'holidays';
    protected $dateFormat = 'd F, Y';
    protected $primaryKey = 'id';
    public $timestamps= false;

    protected $fillable = [
        'holiday_name',
        'holiday_date',
        'day',
    ];
    
    public function setDateAttribute( $value ) {
        $this->attributes['date'] = (new Carbon($value))->format('d F, Y');
      }
    
   protected $casts = [
            
        'holiday_date' => 'date:d-m-Y',
    ];

    public function create()
    {
        $date = date('Y-m-d H:i:s');
        $newDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)
                        ->format('d-m-Y');
        dd($newDate);
        Carbon::createFromFormat('d F, Y', $request->date);
    }


   
    //{{ Carbon\Carbon::createFromFormat('d/m/Y', $holiday->holiday_date)->format('d-m-Y') }}
    

}
