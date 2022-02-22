<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;



class contacto extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $dates = ['deleted_at'];


  public $timestamps= false;
   
  protected $casts=[
      'items'=> 'array'
  ];

  protected $guarded=[];

    use HasFactory;


//relacionamentos
    public function user(){
       
        return $this->belongsTO(User::class);
    }
}
