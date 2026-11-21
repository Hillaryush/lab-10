<?php
$name = trim($_POST['name'] ?? '');
$age  = filter_var($_POST['age'] ?? '', FILTER_VALIDATE_INT);

// Invalid or missing input goes back to the form
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || $name === '' || $age === false || $age < 0) {
    header('Location: index.html'); exit;
}
$safe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $age < 18 ? 'Access denied' : 'Welcome' ?></title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
  <main class="card">
    <?php if ($age < 18): ?>
      <div class="msg bad">Hello, <?= $safe ?>, you are not authorized to visit the site</div>
    <?php else: ?>
      <div class="msg ok">Welcome to this site</div>
    <?php endif; ?>
    <a class="link" href="index.html">Back</a>
  </main>
</body>
</html>
