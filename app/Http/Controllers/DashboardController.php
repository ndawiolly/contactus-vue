<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Course;
use App\Models\User;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
      
        return Inertia::render('Dashboard', [
            'stats' => [
                'contacts' => Contact::count(),
                'courses'  => Course::count(),
                'users'    => User::count(),
            ],
        ]);
    }
}
