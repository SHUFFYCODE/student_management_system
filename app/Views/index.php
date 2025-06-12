<h1>Students List</h1>
<a href="/students/create">Add New Student</a>
<table border="1">
    <thead>
        <tr>
            <th>Student ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($students as $student): ?>
        <tr>
            <td><?= $student['student_id']; ?></td>
            <td><?= $student['name']; ?></td>
            <td><?= $student['age']; ?></td>
            <td><?= $student['course']; ?></td>
            <td>
                <a href="/students/edit/<?= $student['student_id']; ?>">Edit</a> | 
                <a href="/students/delete/<?= $student['student_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
