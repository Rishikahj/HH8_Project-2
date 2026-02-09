<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$challenge_id = $_POST['challenge_id'];
$entered_flag = $_POST['flag'];

// Get correct flag + points
$query = "SELECT flag, points FROM challenges WHERE id='$challenge_id'";
$result = mysqli_query($conn, $query);

$challenge = mysqli_fetch_assoc($result);

if($challenge){

    if($entered_flag === $challenge['flag']){

        $points = $challenge['points'];

        // ⭐ ADD SCORE
        mysqli_query($conn,
        "UPDATE users 
         SET score = score + $points 
         WHERE id = $user_id");

        echo "<h2>✅ Correct Flag! +$points points</h2>";
        echo "<a href='challenges.php'>Back to Challenges</a>";

    }else{

        echo "<h2>❌ Wrong Flag! Try again.</h2>";
        echo "<a href='challenges.php'>Back</a>";
    }

}else{
    echo "Challenge not found.";
}
?>