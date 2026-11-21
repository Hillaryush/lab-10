<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

if (!isset($_SESSION['name'], $_SESSION['start'])) { header('Location: index.php'); exit; }

$name    = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
$seconds = time() - $_SESSION['start'];
$h = intdiv($seconds, 3600);
$m = intdiv($seconds % 3600, 60);
$s = $seconds % 60;
$duration = sprintf('%d hour(s), %d minute(s), %d second(s)', $h, $m, $s);

// End the session after reading the values
$_SESSION = [];
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Logged out</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
  <main class="card">
    <h1>Thank you, <?= $name ?>!</h1>
    <p>You have been logged out.</p>
    <dl class="rows">
      <div><dt>Duration of usage</dt><dd><?= $duration ?></dd></div>
    </dl>
    <a class="link" href="index.php">Log in again</a>
  </main>
</body>
</html>
