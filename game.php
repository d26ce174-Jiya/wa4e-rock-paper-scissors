<?php
if (!isset($_GET['name']) || trim($_GET['name']) === '') {
    die("Name parameter missing");
}

$name = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');

if (isset($_POST['logout'])) {
    header('Location: index1.php');
    exit();
}

$names = array('Rock', 'Paper', 'Scissors');

$human = isset($_POST['human']) ? (int)$_POST['human'] : -1;
$computer = rand(0, 2);

function check($c, $h) {
    if ($h == $c) return "Tie";
    if (($h + 1) % 3 == $c) return "You Lose";
    return "You Win";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>e87f7ce8 - <?php echo $name; ?></title>
</head>
<body>

<h1>Welcome, <?php echo $name; ?></h1>

<form method="POST">
<select name="human">
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
</select>

<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<?php
if ($human >= 0 && $human <= 2 && !isset($_POST['logout'])) {
    echo "Your Play=" . $names[$human] . "\n";
    echo "Computer Play=" . $names[$computer] . "\n";
    echo "Result=" . check($computer, $human) . "\n";
}
?>

</body>
</html>
