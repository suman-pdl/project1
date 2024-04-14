<?php
session_start();
include 'connection.php';

// Check if user is logged in (assuming email is stored in session)
if (!isset($_SESSION['email'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

// Query to fetch notes for the logged-in user
$email = $_SESSION['email'];
$sql = "SELECT 'id',`title`, `content` FROM `notes` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);

// Display notes in a simple HTML table
if (mysqli_num_rows($result) > 0) {
    echo '<h2>Your Notes</h2>';
    echo '<table border="1" cellpadding="5" cellspacing="0">';
    echo '<tr><th>Title</th><th>Content</th>
    <th class="delete">Delete</th></tr>';

    // Loop through each row in the result set
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' .$row['title']. '</td>';
        echo '<td>' .$row['content']. '</td>';
        echo "<td class='delete'><a href='deletenote.php?id=" . $row["id"] . "'>Delete</a></td>";
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo "No notes found.";
}

// Close database connection
mysqli_close($conn);
?>
