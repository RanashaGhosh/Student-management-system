<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card shadow p-4" style="width:460px">
<h2 class="text-center mb-3">Edit Student</h2>

<form action="/students/{{ $student->id }}" method="POST">

@csrf
@method('PUT')

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" value="{{ $student->name }}" class="form-control">
</div>

<br><br>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" value="{{ $student->email }}" class="form-control">
</div>

<br><br>

<div class="mb-3">
<label>Course</label>
<input type="text" name="course" value="{{ $student->course }}" class="form-control">
</div>

<br><br>

<button type="submit" class="btn btn-primary w-100">Update</button>

</form>
</body>
</html>