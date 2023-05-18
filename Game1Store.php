<?php
session_start();
include 'database.php';
$usn = $_SESSION['uuser'];
$wpm = $_POST['wpm'];


// Get the current highest WPM for the user
$sql = "SELECT highestWPM FROM typingmaster WHERE userName = '$usn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currWPM = $row['highestWPM'];
} else {
    $currWPM = 0;
}

// If the current WPM is higher than the previous highest WPM, update the database
if ($wpm > $currWPM) {
    $sql = "UPDATE typingmaster SET highestWPM = '$wpm' WHERE userName = '$usn'";
    if ($conn->query($sql) === TRUE) {
        echo "WPM updated successfully";
    } else {
        echo "Error updating WPM: " . $conn->error;
    }
} else {
    echo "WPM not updated";
}

$conn->close();
?>
