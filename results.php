<!DOCTYPE html>
<html>
<head>
    <title>Twitter Search</title>
    <link rel="stylesheet" type="text/css" href="style2.css" />
    <link href="https://fonts.googleapis.com/css?family=Inconsolata:700|Muli|Quicksand:500&display=swap" rel="stylesheet">
    <?php include("logic.php"); ?>
</head>
<body>
  <h1 class="heading1">Results of Search:</h1>
  <table>
    <tr>
      <th>Profile Picture</th>
      <th>Time and Date of Tweet:</th>
      <th>Tweeted by:</th>
      <th>Screen name:</th>
      <th>Followers:</th>
      <th>Friends:</th>
      <th>Tweet:</th>
    </tr>
    <?php
    foreach($string as $items):
        ?>
            <tr>
            <?php
            echo "<td><img src=".$items['user']['profile_image_url']."></td>";
            echo "<td>".$items['created_at']."</td>";
            echo "<td>". $items['user']['screen_name']."</td>";
            echo "<td>". $items['user']['followers_count']."</td>";
            echo "<td>". $items['user']['friends_count']."</td>";
            echo "<td>". $items['user']['listed_count']."</td>";
            echo "<td>". $items['text']."</td>";
            ?>
            </tr>
      <?php endforeach; ?>
</table>

</body>

</html>
