<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $challenge_id = $_POST['challenge_id'];
    $user_flag = $_POST['flag'];

    // Fetch correct flag from database
    $query = "SELECT flag FROM challenges WHERE id = $challenge_id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $correct_flag = $row['flag'];

        if ($user_flag === $correct_flag) {
            $status = "Correct";
            $message = "✅ Correct Flag! Well done.";
        } else {
            $status = "Wrong";
            $message = "❌ Wrong Flag. Try again.";
        }

        // Store submission result
        $insert = "INSERT INTO submissions (submitted_flag, result)
                   VALUES ('$user_flag', '$status')";
        mysqli_query($conn, $insert);
    } else {
        $message = "Invalid challenge.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Flag Result</title>
</head>
<body>
    <h2><?php echo $message; ?></h2>
    <a href="challenges.php">Back to Challenges</a>
</body>
</html>
