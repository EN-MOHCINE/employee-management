<!DOCTYPE html>
<html>
<head>
    <title>New Department Notification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            color: #555555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>New Department Created</h1>
        <p>A new department has been created: {{ $department->department_name }}</p>
    </div>
</body>
</html>