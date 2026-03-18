<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Display a listing of the students
    public function index()
    {
        $students = Student::all();
        return view('student', compact('students'));
    }

    // Show the form for creating a new student
    public function store(Request $request) 
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'course' => 'required'
    ]);
        Student::create($request->all());
        return redirect('/students')->with('success', 'Student added successfully!');
    }

    // Show the form for editing the specified student
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));
    }

    // Update the specified student in storage
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect('/students')->with('success', 'Student updated successfully!');
    }

    // Remove the specified student from storage
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/students')->with('success', 'Student deleted successfully!');
    }

}
