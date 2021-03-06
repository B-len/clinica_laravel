<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','last_name','phone_number',
        'dni','address','birth_date','email'
        ,'group','medical_data'
    ];
}
