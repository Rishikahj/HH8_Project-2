<?php
session_start();

// ✅ Protect page (VERY IMPORTANT)
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

include 'db.php';

// Fetch challenges
$query = "SELECT id, challenge_name, description, points FROM challenges";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
    <title>CTF Challenges</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 40px;
        }

        .challenge {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
        }

        .top-bar{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        button{
            padding:6px 12px;
            cursor:pointer;
        }
    </style>
</head>
<body>

<div class="top-bar">
    <h1>CTF Challenges</h1>

    <!-- ⭐ Looks VERY Professional -->
    <div>
        Welcome, <strong><?php echo $_SESSION['username']; ?></strong> |
        <a href="leaderboard.php">Leaderboard</a> |
        <a href="logout.php">Logout</a>
    </div>
</div>


<?php while ($row = mysqli_fetch_assoc($result)) { ?>

    <div class="challenge">

        <h3><?php echo $row['challenge_name']; ?></h3>

        <p><?php echo $row['description']; ?></p>

        <p><strong>Points:</strong> <?php echo $row['points']; ?></p>

        <form method="post" action="submit_flag.php">
            <input type="hidden" 
                   name="challenge_id" 
                   value="<?php echo $row['id']; ?>">

            <input type="text" 
                   name="flag" 
                   placeholder="Enter flag" 
                   required>

            <button type="submit">Submit</button>
        </form>

    </div>

<?php } ?>

</body>
</html>


