<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student | Student Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        * { box-sizing: border-box; }


        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: rgb(55, 20, 121);
            color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 60px 20px;
            min-height: 100vh;
        }


        .form-wrapper {
            background-color: white;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            max-width: 700px;
            width: 100%;
        }


        .form-content {
            padding: 40px 30px;
        }


        h2 {
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 30px;
            border-bottom: 2px solid rgb(103, 107, 163);
            padding-bottom: 10px;
            text-align: center;
            color: rgb(55, 20, 121);
        }


        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }


        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #eee;
            font-size: 14px;
        }


        button {
            width: 100%;
            padding: 12px;
            background-color: rgb(103, 107, 163);
            color: white;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        button:hover {
            background-color: rgb(40, 32, 85);
        }


        .alert {
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }


        .alert-danger {
            background-color: #f44336;
            color: white;
        }


        .alert-success {
            background-color: #4CAF50;
            color: white;
        }


        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #999;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
        }


        .back-btn:hover {
            background-color: #666;
        }


        @media (max-width: 600px) {
            body {
                padding: 20px;
            }
            .form-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>


<div class="form-wrapper">
    <div class="form-content">
        <h2>Create Student</h2>


        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>


        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>


        <form action="/students/store" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>


            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" required>


            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>


            <label for="age">Age</label>
            <input type="number" id="age" name="age" required>


            <label for="course">Course</label>
            <input type="text" id="course" name="course" required>


            <label for="image">Upload Profile Picture (optional):</label>
            <input type="file" name="image" accept="image/*">


            <button type="submit"><i class="fas fa-plus-circle"></i> Add Student</button>
        </form>


        <a href="/students" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Students List</a>
    </div>
</div>


</body>
</html>


