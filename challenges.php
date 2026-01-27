<?php
include 'db.php';

$query = "SELECT id, challenge_name, description, points FROM challenges";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CTF Challenges</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .challenge {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
        }
    </style>
</head>
<body>

<h1>CTF Challenges</h1>

<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="challenge">
        <h3><?php echo $row['challenge_name']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <p><strong>Points:</strong> <?php echo $row['points']; ?></p>

        <form method="post" action="submit_flag.php">
            <input type="hidden" name="challenge_id" value="<?php echo $row['id']; ?>">
            <input type="text" name="flag" placeholder="Enter flag" required>
            <button type="submit">Submit</button>
        </form>
    </div>
<?php } ?>

</body>
</html>
