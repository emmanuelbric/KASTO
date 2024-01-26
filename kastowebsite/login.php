<?php
include('connection.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = $_POST["password"];

    // Database connection
    $conn = createConnection();

    // Prepare and execute SQL query to retrieve user data from the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, redirect to a success page or user dashboard
            header("Location: success.html");
            echo("successful");
            exit();
        } else {
            // Invalid password, redirect back to the login page with an error message
            header("Location: login.html?error=invalid_password");
            exit();
        }
    } else {
        // User not found, redirect back to the login page with an error message
        header("Location: login.html?error=user_not_found");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
