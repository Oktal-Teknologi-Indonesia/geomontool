<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class positionlog extends Model
{
    use HasFactory;
    protected $table = 'positionlogs';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
}
