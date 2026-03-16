<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>

<form action="/students/{{ $student->id }}" method="POST">

@csrf
@method('PUT')

<label>Name</label>
<input type="text" name="name" value="{{ $student->name }}">

<br><br>

<label>Email</label>
<input type="text" name="email" value="{{ $student->email }}">

<br><br>

<label>Course</label>
<input type="text" name="course" value="{{ $student->course }}">

<br><br>

<button type="submit">Update</button>

</form>
</body>
</html>