<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Inertia\Inertia;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        // dd($courses);
        return Inertia::render('Course', [
            'courses' => $courses,
        ]);
    }

    public function show($id){
        $course = Course::findOrFail($id);
        return Inertia::render('course/show', [
            'course' => $course,
        ]);
    }
}
