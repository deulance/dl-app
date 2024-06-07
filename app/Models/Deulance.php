<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Deulance extends Model
{
    use HasFactory;
    protected $table = 'deulance';
    protected $guarded = ['id'];
    public $timestamps = true;
    // protected $hidden = ['id', 'created_at', 'updated_at'];
    protected $hidden = ["extra_attributes"];

}
