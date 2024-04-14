

<?php
session_start();
include 'connection.php';

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

// Retrieve user's email from session
$email = $_SESSION['email'];

// Fetch data from database
$sql = "SELECT * FROM userpassword WHERE useremail = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind parameters to the statement
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get result
    $result = mysqli_stmt_get_result($stmt);

    // Check if there are any rows
    if (mysqli_num_rows($result) > 0) {
        // Display table header
        echo '<table border="1">
                <tr>
                    <th>Title</th>
                    <th>Web Email</th>
                    <th>Password</th>
                </tr>';

        // Loop through each row
        while ($row = mysqli_fetch_assoc($result)) {
            // Display row data in table rows
            echo '<tr>';
            echo '<td>' . htmlspecialchars($row['title']) . '</td>';
            echo '<td>' . htmlspecialchars($row['webemail']) . '</td>';
            echo '<td>' . htmlspecialchars($row['passwd']) . '</td>';
            echo '</tr>';
        }

        // Close table
        echo '</table>';
    } else {
        echo 'No passwords found.';
    }

    // Close statement
    mysqli_stmt_close($stmt);
} else {
    echo 'Error in preparing statement.';
}

// Close connection
mysqli_close($conn);
?>
