<h2>Are you sure you want to delete this bad student?</h2>

<p>Student ID: <?= $student['student_id'] ?></p>
<p>Name: <?= $student['name'] ?></p>

<form action="/students/delete/<?= $student['student_id'] ?>" method="post">
    <input type="submit" value="Delete Student" onclick="return confirm('Are you sure?')">
</form>
