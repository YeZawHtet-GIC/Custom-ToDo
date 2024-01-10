<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTodo extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'title'=>'required',
        'description'=> 'required',
        'importantlv'=> 'required',
        'status'=> 'required',
    ];
}
