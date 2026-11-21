<?php
session_start();
date_default_timezone_set('Asia/Kolkata');

// Name comes from the request; store it with the start time in the session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'])) {
    $name = trim($_POST['name']);
    if ($name !== '') {
        $_SESSION['name']  = $name;
        $_SESSION['start'] = time();
    }
}

// No session data means the user did not come through the form
if (!isset($_SESSION['name'])) { header('Location: index.php'); exit; }

$name  = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
$start = date('d M Y, h:i:s A', $_SESSION['start']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Hello <?= $name ?></title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
  <main class="card">
    <div class="time">Started at<br><strong><?= $start ?></strong></div>
    <h1 style="margin-top:28px">Hello, <?= $name ?>!</h1>
    <p>Your session is active. Click logout when you are done.</p>
    <form action="logout.php" method="post">
      <button type="submit">Logout</button>
    </form>
  </main>
</body>
</html>
