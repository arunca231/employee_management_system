<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employ_tbl extends Model
{
    use HasFactory;

    protected $table = 'employ_tbls';

    protected $fillable = [
        'name',
        'email',
        'department',
        'salary',
        'joining_date',
    ];
}
