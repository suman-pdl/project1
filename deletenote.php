<?php
session_start();
include 'connection.php';

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Check if title parameter is provided via GET request
if (isset($_GET['title'])) {
    // Retrieve user's email from session
    $email = $_SESSION['email'];
    
    // Retrieve and sanitize title parameter from GET request
    $title = $_GET['title'];

    // Delete notes record from database based on email and title
    $sql = "DELETE FROM notes WHERE email = ? AND title = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "ss", $email, $title);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Check if any rows were affected
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Note deleted successfully";
                // Redirect to a confirmation page or notes list
                header('Location: viewnote.php');
                exit();
            } else {
                echo "No note deleted. Record not found or you do not have permission.";
            }
        } else {
            echo "Error deleting note: " . mysqli_stmt_error($stmt);
            // Log detailed error for debugging
            // Example: error_log(mysqli_stmt_error($stmt));
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "Error in preparing delete statement.";
    }
} else {
    echo "Invalid request. Note title not provided.";
}

// Close connection
mysqli_close($conn);
?>
