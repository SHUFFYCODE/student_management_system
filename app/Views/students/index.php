<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: rgb(64, 88, 67);
        }
        .container {
            max-width: 1000px;
            margin-top: 50px;
        }
        .table-container {
            background-color: rgb(116, 182, 125);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead {
            background-color: #4e704f;
            color: white;
        }
        .buttons-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .logout-btn {
            background-color: #e74c3c;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
        .add-student-btn {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
        }
        .add-student-btn:hover {
            background-color: #218838;
        }
        .table tbody tr {
            background-color: #d1e7dd;
        }
    </style>
</head>
<body>


    <div class="container">
        <div class="table-container">
            <h2>STUDENT LIST</h2>


            <div class="buttons-container">
                <a href="/logout" class="logout-btn">Log Out</a>
                <?php if (session()->get('role') === 'admin'): ?>
                    <a href="/students/create" class="add-student-btn">Add New Student</a>
                <?php endif; ?>
            </div>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Course</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= esc($student['student_id']) ?></td>
                            <td><?= esc($student['name']) ?></td>
                            <td><?= esc($student['age']) ?></td>
                            <td><?= esc($student['course']) ?></td>
                            <td>
                                <a href="/students/read/<?= esc($student['student_id']) ?>" class="btn btn-info btn-sm">View</a>
                                <?php if (session()->get('role') === 'admin'): ?>
                                    <a href="/students/edit/<?= esc($student['student_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="/students/delete/<?= esc($student['student_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


</body>
</html>


