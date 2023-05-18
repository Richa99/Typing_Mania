<?php
session_start();
include 'database.php';
$usn = $_SESSION['uuser'];
$score = $_POST['score'];


// Get the current highest WPM for the user
$sql = "SELECT highestscore FROM wordgame WHERE userName = '$usn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currscore = $row['highestscore'];
} else {
    $currscore = 0;
}

// If the current WPM is higher than the previous highest WPM, update the database
if ($score > $currscore) {
    $sql = "UPDATE wordgame SET highestscore = '$score' WHERE userName = '$usn'";
    if ($conn->query($sql) === TRUE) {
        echo "score updated successfully";
    } else {
        echo "Error updating score: " . $conn->error;
    }
} else {
    echo "score not updated";
}

$conn->close();
?>
