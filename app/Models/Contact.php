<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact'; // Nom de la table dans la base de données

    protected $primaryKey = 'contact_id'; // Clé primaire de la table

    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'phone',
        'message',
        'senting_date',
    ];

    public $timestamps = false; 
}
