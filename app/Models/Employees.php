<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;
    public $timestamps=null;
    protected $table = 'employees';
    protected $fillable = ['fname','lname','company_id','email','phone'];
    public function companies(){   
        return $this->belongsTo(companies::class,'company_id');    
    }
}
