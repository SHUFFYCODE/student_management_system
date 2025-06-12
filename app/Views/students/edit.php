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
            background-color: rgb(55, 20, 121);
            margin: 0;
            padding: 0;
        }


        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }


        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }


        form {
            display: flex;
            flex-direction: column;
        }


        label {
            font-size: 1rem;
            margin-bottom: 5px;
            color: #333;
        }


        input {
            padding: 10px;
            font-size: 1rem;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
        }


        button {
            padding: 12px;
            font-size: 1rem;
            background-color: rgb(103, 107, 163);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }


        button:hover {
            background-color: rgb(40, 32, 85);
        }


        .disabled {
            background-color: #f0f0f0;
        }


        .back-btn {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #ccc;
            color: white;
            border-radius: 4px;
            text-align: center;
        }


        .back-btn:hover {
            background-color: #999;
        }


        img.profile-preview {
            max-width: 150px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>EDIT STUDENT</h1>
        <form method="post" action="/students/update/<?= esc($student['student_id']); ?>" enctype="multipart/form-data">
            <?= csrf_field(); ?>


            <input type="hidden" name="student_id" value="<?= esc($student['student_id']); ?>">


            <label for="student_id">Student ID:</label>
            <input type="text" value="<?= esc($student['student_id']); ?>" disabled class="disabled">


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
