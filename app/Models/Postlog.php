<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postlog extends Model
{
    use HasFactory;

    protected $table = 'postlogs';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
}
