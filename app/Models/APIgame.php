<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIgame extends Model
{
    use HasFactory;
    protected $table = 'tech_game';
    public $timestamps=false;
    protected $fillable = ['title','date','description','image'];
}
