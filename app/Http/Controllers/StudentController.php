<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student', compact('students'));
    }

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

    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect('/students')->with('success', 'Student updated successfully!');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect('/students')->with('success', 'Student deleted successfully!');
    }

}
