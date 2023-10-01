<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTestimonial extends Model
{
    use HasFactory;



    protected $table = 'customer_testimonials';

    protected $primaryKey = 'testimonial_id';

    protected $fillable = [
        'client_name',
        'comment',
        'rating',
        'date_testimony',
    ];

    public $timestamps = false; 

}
