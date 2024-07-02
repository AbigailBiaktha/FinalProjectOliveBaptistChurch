<?php
session_start();
require_once(__DIR__ . "/../connect.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);

    // Execute the statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($id, $hashed_password);

    // Fetch the result
    if ($stmt->fetch()) {
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, start a new session
            $_SESSION['admin_id'] = $id;
            header("Location: admin_view.php");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid email or password.";
        }
    } else {
        // No user found
        echo "Invalid email or password.";
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
