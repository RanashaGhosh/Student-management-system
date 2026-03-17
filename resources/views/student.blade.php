<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand" href="#">Student Management</span>

        <a href="/logout" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-4">
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
<form action="/students/store" method="POST" class="card p-4 shadow-sm">
    @csrf

    <div class="col-md-4">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" class="form-control" required><br><br>
    </div>

    <div class="col-md-4">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="form-control" required><br><br>
    </div>

    <div class="col-md-4">
    <label for="course">Course:</label>
    <input type="text" id="course" name="course" class="form-control" required><br><br>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Add Student</button>
</form>

<hr class="my-5">

<h2>Student List</h2>

<table class="table table-bordered table-hover shadow-sm">

    <thead class="table-dark">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
    </tr>
    </thead>

<tbody>
    @foreach($students as $student)
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->course }}</td>

        <td>
            <a href="/students/{{ $student->id }}" class="btn btn-warning btn-sm">Edit</a>
            
            
        </td>  
            <td>
                <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form> 
            </td>
            
    </tr>
    @endforeach
</tbody>
</table>
</body>
</html>