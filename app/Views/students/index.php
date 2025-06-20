<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #3c5740;
            color: #fff;
        }
        .container {
            max-width: 1100px;
            margin-top: 50px;
        }
        .table-container {
            background-color: #78b38a;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .table-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #fff;
        }
        .table thead {
            background-color: #456f4c;
            color: #fff;
        }
        .table tbody tr {
            background-color: #eaf4ee;
            color: #333;
        }
        .btn-sm {
            margin-right: 5px;
        }
        .btn-info {
            color: #fff;
        }
        .buttons-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }
        .add-student-btn, .logout-btn {
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 6px;
        }
        .logout-btn {
            background-color: #e74c3c;
            color: white;
        }
        .logout-btn:hover {
            background-color: #c0392b;
        }
        .add-student-btn {
            background-color: #28a745;
            color: white;
        }
        .add-student-btn:hover {
            background-color: #218838;
        }
        .input-group input {
            border-radius: 6px 0 0 6px;
        }
        .input-group button {
            border-radius: 0 6px 6px 0;
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


        <form method="get" action="<?= base_url('students') ?>" class="mb-3" id="searchForm">
    <div class="input-group">
        <input type="text" name="search" class="form-control" id="searchInput" placeholder="Search by name or ID" value="<?= esc($search) ?>">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>


<script>
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');


    searchInput.addEventListener('input', function () {
        if (this.value.trim() === '') {
            searchForm.submit(); 
        }
    });
</script>

        <table class="table table-hover table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Age</th>
                    <th scope="col">Course</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student): ?>
                    <tr>
                        <td><?= esc($student['student_id']) ?></td>
                        <td><?= esc($student['name']) ?></td>
                        <td><?= esc($student['age']) ?></td>
                        <td><?= esc($student['course']) ?></td>
                        <td class="text-center">
                            <a href="/students/read/<?= esc($student['student_id']) ?>" class="btn btn-info btn-sm">View</a>
                            <?php if (session()->get('role') === 'admin'): ?>
                                <a href="/students/edit/<?= esc($student['student_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/students/delete/<?= esc($student['student_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php if (empty($students)): ?>
                    <tr>
                        <td colspan="5" class="text-center">No students found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


