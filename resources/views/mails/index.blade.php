<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>New Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #101010;
            color: white;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #564d4d;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: white;
            font-weight: bold;
        }

        p {
            margin: 10px 0;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>New Request</h1>
        <p>New Request At {{ $distressCall->created_at }}.</p>
        <p>Request:</p>
        <ul>
            <li>User: {{ $distressCall->user->username }}</li>
            <li>Title: {{ $distressCall->title }}</li>
        </ul>
    </div>
    <div class="footer">
        <p>&copy; 2024 Laraflix. All rights reserved.</p>
    </div>
</body>

</html>
