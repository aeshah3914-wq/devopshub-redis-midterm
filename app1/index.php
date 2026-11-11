<?php
$redis = new Redis();
$redis->connect('redis', 6379);
$redis->incr('visit_count');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty(trim($_POST['message']))) {
    $redis->rPush('messages', trim($_POST['message']));
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DevOpsHub - Message Collector</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="card">
    <h1>DevOpsHub Feedback</h1>
    <?php if (!empty($success)) echo '<p class="ok">Message sent!</p>'; ?>
    <form method="POST">
      <textarea name="message" placeholder="Write your feedback..." required></textarea>
      <button type="submit">Send</button>
    </form>
  </div>
</body>
</html>
