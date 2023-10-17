<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerTestimonial;



class CustomerTestimonialController extends Controller
{

    public function createCustomerTestimonial(Request $request)
    {


        $request->validate([
            'client_name' => 'required',
            'comment' => 'required',
            'rating' => 'required',
            'date_testimony' => 'required',
        ]);
        $customerTestimonial = CustomerTestimonial::create($request->all());

        return response()->json([
            "message" => "customer testimonial record created",
            "data" => $customerTestimonial
        ], 201);
    }

    public function getCustomerTestimonials()
    {


        $customerTestimonials = CustomerTestimonial::all();

        if ($customerTestimonials->isEmpty()) {
            return response()->json(['message' => 'Aucun customer testimonial trouvé'], 404);
        }
        return response()->json([
            'success' => true,
            'service' => 'Customer Testimonials API',
            'message' => 'Listes des customer testimonials',
            'testimonials' => $customerTestimonials,
        ], 200);
    }



    public function getCustomerTestimonialById($customer_testimonial_id)
    {
        $customerTestimonial = CustomerTestimonial::find($customer_testimonial_id);

        if (!$customerTestimonial) {
            return response()->json([
                'success' => false,
                'message' => 'Customer Testimonial introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Customer Testimonial trouvé',
            'data' => $customerTestimonial
        ]);
    }

    public function updateCustomerTestimonial(Request $request, $customer_testimonial_id)
    {
        $customerTestimonial = CustomerTestimonial::findOrFail($customer_testimonial_id);

        $customerTestimonial->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Customer Testimonial mis à jour',
            'data' => $customerTestimonial
        ]);
    }



    public function deleteCustomerTestimonial($customer_testimonial_id)
    {
        $customerTestimonial = CustomerTestimonial::find($customer_testimonial_id);

        if (!$customerTestimonial) {
            return response()->json([
                'success' => false,
                'message' => 'Customer Testimonial introuvable'
            ], 404);
        }

        $customerTestimonial->delete();

        return response()->json([
            'success' => true,
            'message' => 'Customer Testimonial supprimé'
        ]);
    }
}
