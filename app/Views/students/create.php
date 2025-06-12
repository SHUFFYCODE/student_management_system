<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Student | Student Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #2e1d42;
            color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 60px 20px;
            min-height: 100vh;
        }

        .form-wrapper {
            background-color: #3d2b56;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            max-width: 700px;
            width: 100%;
        }

        .accent-bar {
            width: 8px;
            background-color: #8c6bb5;
        }

        .form-content {
            padding: 40px 30px;
            flex: 1;
        }

        h2 {
            margin-top: 0;
            font-size: 26px;
            font-weight: 600;
            margin-bottom: 30px;
            border-bottom: 2px solid #7a5ea1;
            padding-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            background-color: #eee;
            color: #333;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #6a4c93;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #56387d;
        }

        .alert {
            background-color: #ffdddd;
            color: #900;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            background-color: #ccc;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #999;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            .form-wrapper {
                flex-direction: column;
            }

            .accent-bar {
                height: 8px;
                width: 100%;
            }

            .form-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<div class="form-wrapper">
    <div class="accent-bar"></div>
    <div class="form-content">
        <h2>Create Student</h2>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/students/store" method="POST">
            <?= csrf_field() ?>

            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" required />

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required />

            <label for="age">Age</label>
            <input type="number" id="age" name="age" required />

            <label for="course">Course</label>
            <input type="text" id="course" name="course" required />

            <button type="submit">Submit</button>
        </form>

        <!-- Back Button -->
        <a href="/students" class="back-btn">Back to Students List</a>
    </div>
</div>

</body>
</html>
