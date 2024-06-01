<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    public $timestamps=null;
    protected $table = 'companies';
    protected $fillable = ['name','email','logo','website'];
    public function Employees(){
        return $this->hasMany(Employees::class);
    }
}
