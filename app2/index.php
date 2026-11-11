<?php
$redis = new Redis();
$redis->connect('redis', 6379);
$totalMessages = $redis->lLen('messages');
$totalVisits   = $redis->get('visit_count') ?: 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>DevOpsHub - Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="card">
    <h1>Dashboard</h1>
    <div class="stat"><span><?= $totalMessages ?></span><p>Total Messages</p></div>
    <div class="stat"><span><?= $totalVisits ?></span><p>Total Visits</p></div>
  </div>
</body>
</html>
