<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Profile</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />


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
            margin-bottom: 30px;
            color: white;
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
        .card h5 {
            margin-bottom: 20px;
        }
        .table thead {
            background-color: #4e704f;
            color: white;
        }
        .table tbody tr {
            background-color: #d1e7dd;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="profile-container">
        <h2><i class="bi bi-person-circle me-2"></i>Student Profile</h2>


        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success text-center">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>


        <div class="profile-image">
            <?php if (!empty($student['image']) && file_exists(FCPATH . 'uploads/' . $student['image'])): ?>
                <img src="<?= base_url('uploads/' . esc($student['image'])) ?>" alt="Profile Image" />
            <?php else: ?>
                <img src="https://via.placeholder.com/200?text=No+Image" alt="No Image" />
            <?php endif; ?>
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-info-circle-fill me-2"></i>Student Details</h5>
                <p><strong>Student ID:</strong> <?= esc($student['student_id']) ?></p>
                <p><strong>Name:</strong> <?= esc($student['name']) ?></p>
                <p><strong>Age:</strong> <?= esc($student['age']) ?></p>
                <p><strong>Course:</strong> <?= esc($student['course']) ?></p>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-journal-text me-2"></i>Grades</h5>
                <?php if (!empty($grades)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Grade</th>
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
                    </div>
                <?php else: ?>
                    <p>No grades available for this student.</p>
                <?php endif; ?>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><i class="bi bi-calendar-check-fill me-2"></i>Attendance</h5>
                <?php if (!empty($attendance)): ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Status</th>
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
                    </div>
                <?php else: ?>
                    <p>No attendance records available for this student.</p>
                <?php endif; ?>
            </div>
        </div>


        <div class="text-center">
            <a href="<?= base_url('/students') ?>" class="btn btn-info">
                <i class="bi bi-arrow-left-circle"></i> Back to Student List
            </a>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


