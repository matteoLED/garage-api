<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    use HasFactory;

    protected $table = 'hours';
    protected $primaryKey = 'id';

    protected $fillable = [
        'day',
        'open_hour',
        'close_hour',
    ];

    public $timestamps = false;
}
