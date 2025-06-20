<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(64, 88, 67);
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px 20px;
            background-color: #f3fdf3;
            border-radius: 10px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: rgb(55, 95, 60);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 6px;
            color: #333;
        }
        input {
            padding: 10px;
            font-size: 1rem;
            margin-bottom: 20px;
            border: 1px solid #bbb;
            border-radius: 5px;
            width: 100%;
        }
        input:disabled {
            background-color: #eee;
            color: #666;
        }
        button {
            padding: 12px;
            font-size: 1rem;
            background-color: rgb(78, 112, 79);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: rgb(62, 89, 63);
        }
        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 15px;
            background-color: rgb(136, 136, 136);
            color: white;
            border-radius: 4px;
            text-align: center;
        }
        .back-btn:hover {
            background-color: rgb(100, 100, 100);
        }
        img.profile-preview {
            max-width: 160px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.2);
        }
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-danger {
            background-color: #f44336;
            color: white;
        }
        .alert-success {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">


        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>


        <h1><i class="fas fa-user-edit"></i> Edit Student</h1>


        <form method="post" action="/students/update/<?= esc($student['student_id']); ?>" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="student_id" value="<?= esc($student['student_id']); ?>">


            <label for="student_id">Student ID:</label>
            <input type="text" value="<?= esc($student['student_id']); ?>" disabled>


            <label for="name">Name:</label>
            <input type="text" name="name" value="<?= esc($student['name']); ?>" required>


            <label for="age">Age:</label>
            <input type="number" name="age" value="<?= esc($student['age']); ?>" required>


            <label for="course">Course:</label>
            <input type="text" name="course" value="<?= esc($student['course']); ?>" required>


            <?php if (!empty($student['image'])): ?>
                <label>Current Profile Picture:</label>
                <img src="/uploads/<?= esc($student['image']); ?>" alt="Student Image" class="profile-preview">
            <?php endif; ?>


            <label for="image">Upload New Profile Picture:</label>
            <input type="file" name="image" accept="image/*">


            <button type="submit"><i class="fas fa-save"></i> Update Student</button>
        </form>


        <a href="/students" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Students List</a>
    </div>
</body>
</html>


