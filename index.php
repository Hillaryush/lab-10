<?php
session_start();
// If the user is already logged in, go straight to the hello page
if (isset($_SESSION['name'])) { header('Location: hello.php'); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Enter your name</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
  <main class="card">
    <h1>Welcome</h1>
    <p>Enter your name to continue.</p>
    <form action="hello.php" method="post">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required autofocus>
      <button type="submit">Submit</button>
    </form>
  </main>
</body>
</html>
