<?php
session_start();
include 'connection.php';

// Check if user is logged in
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare DELETE statement to remove the note with the specified ID
    $sql = "DELETE FROM notes WHERE id = $id AND email = '{$_SESSION['email']}'";

    // Execute DELETE query
    if (mysqli_query($conn, $sql)) {
        echo "Note deleted successfully";
    } else {
        echo "Error deleting note: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request"; // Handle if 'id' parameter is missing
}

// Redirect back to note.php after deletion
header("Location: viewnote.php");
exit;
?>
