<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table= "más_nev";
    protected $primaryKey= "mas_id";
    protected $keyType= "string";
    protected $incrementing= false;
}
