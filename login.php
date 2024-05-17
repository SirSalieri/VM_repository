<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App - Login</title>
    <style>
        body {
            font-family: 'Noto Sans', sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column; /* Ensures vertical stacking */
        }

        .title {
            text-align: center;
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px; /* Adds space between title and form */
        }

        .login-container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .submit {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 10px;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .sign-message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #f8f8f8;
        }
    </style>
</head>
<body>

<h1 class="title">Weather app</h1>

<div class="login-container">
    <h2 class="title">Please login</h2>
    <form method="post" action="login.php" autocomplete="off">
        <label for="Username">Username:</label>
        <input class="input-field" type="text" name="Username" required><br>
        <label for="Password">Password:</label>
        <input class="input-field" type="password" name="Password" required><br>
        <input type="submit" class="submit" value="Log in" name="submit">
    </form>
    <p>Click <a href="index.php">here</a> if you don't have a user.</p>
</div>

<?php
if (isset($_POST['submit'])) {
    include 'db.php';

    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Connect to the database
    $conn = connectDatabase();

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT Passord FROM Users WHERE Brukernavn = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Bind the result to a variable
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Correct login
            header('Location: weather.php');
            exit;
        } else {
            // Invalid password
            echo "<div class='sign-message'>Kunne ikke logge inn. Vennligst skriv inn riktig informasjon.</div>";
        }
    } else {
        // Invalid username
        echo "<div class='sign-message'>Kunne ikke logge inn. Vennligst skriv inn riktig informasjon.</div>";
    }

    $stmt->close();
    $conn->close();
}
?>
</body>
</html>
