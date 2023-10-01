<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(): array
    {
        return [
            'service' => 'restaurant-api',
            'success' => true,
            'message' => 'Hello world!',
            'language' => app()->getLocale(),

        ];
    }
}
