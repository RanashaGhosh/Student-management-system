<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<h1 class="mb-4">Welcome to Student Management System</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<h2>Add a New Student</h2>
<form action="/students/store" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="course">Course:</label>
    <input type="text" id="course" name="course" required><br><br>

    <button type="submit">Add Student</button>
</form>

<h2>Student List</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
    </tr>

    @foreach($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->course }}</td>

        <td>
            <a href="/students/{{ $student->id }}">Edit</a>
            
        </td>  
            <td>
                <form action="/students/{{ $student->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form> 
            </td>
            
    </tr>
    @endforeach

</table>
</body>
</html>