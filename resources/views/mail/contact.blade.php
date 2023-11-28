<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hi {{$userDetails['name']}}!</title>
    <style>
        /* Reset CSS */
        body, body * {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Email content styles */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            margin-bottom: 10px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="email-container">
    <h1>{{$userDetails['name']}}</h1>
    <p>Email, {{$userDetails['email']}}</p>
    <p>{{$userDetails['message']}}</p>
    <a href="http://learn.local/backend/contacts" class="button">Xem</a>
</div>
</body>
</html>
