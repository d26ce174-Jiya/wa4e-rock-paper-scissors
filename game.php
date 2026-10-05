<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}

$names = array('Rock', 'Paper', 'Scissors');
$result = '';

if (isset($_POST['human'])) {
    $human = (int) $_POST['human'];

    if ($human < 0 || $human > 2) {
        $result = "Invalid selection";
    } else {
        $computer = rand(0, 2);

        if ($human == $computer) {
            $outcome = "Tie";
        } elseif (
            ($human == 0 && $computer == 2) ||
            ($human == 1 && $computer == 0) ||
            ($human == 2 && $computer == 1)
        ) {
            $outcome = "You Win";
        } else {
            $outcome = "You Lose";
        }

        $result = "Your Play=" . $names[$human] .
                  " Computer Play=" . $names[$computer] .
                  " Result=" . $outcome;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Aadrittshaya f29de078</title>
</head>
<body>
    <h1>Rock Paper Scissors</h1>

    <p>Welcome: <?php echo htmlspecialchars($_SESSION['name']); ?></p>

    <form method="post">
        <select name="human">
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
        </select>
        <input type="submit" value="Play">
    </form>

    <?php
    if ($result !== '') {
        echo '<p>' . htmlspecialchars($result) . '</p>';
    }
    ?>

    <p><a href="game.php?logout=1">Logout</a></p>
</body>
</html>
