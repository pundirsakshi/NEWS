<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIweb extends Model
{
    use HasFactory;
    protected $table = 'tech_webseries';
    public $timestamps=false;
    protected $fillable = ['title','date','description','image'];
}
