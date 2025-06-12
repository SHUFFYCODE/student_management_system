<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: rgb(64, 88, 67);
        }
        .container {
            max-width: 1000px;
            margin-top: 50px;
        }
        .profile-container {
            background-color: rgb(116, 182, 125);
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }
        .student-info {
            margin-bottom: 30px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .student-info h4 {
            margin-bottom: 20px;
        }
        .student-info p {
            font-size: 1.1rem;
            margin-bottom: 10px;
        }
        .back-btn {
            background-color: #17a2b8;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
        }
        .back-btn:hover {
            background-color: #138496;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead {
            background-color: #4e704f;
            color: white;
        }
        .table tbody tr {
            background-color: #d1e7dd;
        }
        .profile-image {
            text-align: center;
            margin-bottom: 30px;
        }
        .profile-image img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="profile-container">
        <h2>Student Profile</h2>


        <div class="profile-image">
            <?php if (!empty($student['image']) && file_exists(FCPATH . 'uploads/' . $student['image'])): ?>
                <img src="<?= base_url('uploads/' . esc($student['image'])) ?>" alt="Profile Image" />
            <?php else: ?>
                <img src="<?= base_url('uploads/default.png') ?>" alt="No Image" />
            <?php endif; ?>
        </div>


        <div class="student-info">
            <h4>Student Details</h4>
            <p><strong>Student ID: </strong><?= esc($student['student_id']) ?></p>
            <p><strong>Name: </strong><?= esc($student['name']) ?></p>
            <p><strong>Age: </strong><?= esc($student['age']) ?></p>
            <p><strong>Course: </strong><?= esc($student['course']) ?></p>
        </div>


        <div class="student-info">
            <h4>Grades</h4>
            <?php if (!empty($grades)): ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Subject</th>
                            <th scope="col">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($grades as $grade): ?>
                            <tr>
                                <td><?= esc($grade['subject']) ?></td>
                                <td><?= esc($grade['grade']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No grades available for this student.</p>
            <?php endif; ?>
        </div>


        <div class="student-info">
            <h4>Attendance</h4>
            <?php if (!empty($attendance)): ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($attendance as $attend): ?>
                            <tr>
                                <td><?= esc($attend['date']) ?></td>
                                <td><?= esc($attend['status']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No attendance records available for this student.</p>
            <?php endif; ?>
        </div>


        <a href="<?= base_url('/students') ?>" class="back-btn">Back to Student List</a>
    </div>
</div>
</body>
</html>
