<?php
include 'db.php';

$query = "SELECT username, score 
          FROM users 
          ORDER BY score DESC";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Leaderboard</title>
    <style>
        body{
            font-family: Arial;
            margin:40px;
        }

        table{
            border-collapse: collapse;
            width:50%;
        }

        th, td{
            border:1px solid #ccc;
            padding:10px;
            text-align:center;
        }

        th{
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h1>🏆 Leaderboard</h1>

<table>
<tr>
<th>Rank</th>
<th>Username</th>
<th>Score</th>
</tr>

<?php
$rank = 1;

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>
            <td>$rank</td>
            <td>{$row['username']}</td>
            <td>{$row['score']}</td>
          </tr>";

    $rank++;
}
?>

</table>

<br>

<a href="challenges.php">⬅ Back to Challenges</a>

</body>
</html>