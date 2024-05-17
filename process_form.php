<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $username = $_POST['Username'];
    $password = $_POST['Password'];

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Connect to the database
    $conn = connectDatabase();

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Users (Brukernavn, Passord) VALUES (?, ?)");
    $stmt->bind_param('ss', $username, $hashed_password);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo "<div class='sign-message'>Bruker lagd! trykk <a href='login.php'>her</a> for å logge in.</div>";
        } else {
            echo "<div class='sign-message'>kunne ikke lage ny bruker. Prøv igjen.</div>";
        }
    } else {
        echo "<div class='sign-message'>query ble ikke påvirket. Prøv igjen.</div>";
    }

    $stmt->close();
    $conn->close();
}
?>
