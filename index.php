<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Weather App</title>
<!-- <link rel="stylesheet" href="style.css"> -->
<style>
    body {
        font-family: 'Noto Sans', sans-serif;
        background-color: #f0f8ff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .title {
        text-align: center;
        font-size: 2.5em;
        color: #333;
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
</style>
</head>
<body>

<h1 class="title">Weather app</h1>

<div class="login-container">
    <h2 class="title">Please sign up!</h2>
    <form method="post" action="process_form.php" autocomplete="off">
        <label for="Username">Username:</label>
        <input class="input-field" type="text" name="Username" required><br>
        <label for="Password">Password:</label>
        <input class="input-field" type="password" name="Password" required><br>
        <input type="submit" class="submit" value="Create" name="submit">
    </form>
    <p>Click <a href="login.php">here</a> if you have a user already.</p>
</div>

</body>
</html>
