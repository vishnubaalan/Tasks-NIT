<!DOCTYPE html>
<html>
<head>
    <title>SampleForm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            width: 70%;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        h3 {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Enter Your Name</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Your name"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["username"];
        echo "<h3>Hii,  " . htmlspecialchars($name) . "!</h3>";
    }
    ?>
</div>

</body>
</html>
