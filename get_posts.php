<?php
   $getId = intval($_GET['getId']);

   // Create Connection
   $db = new PDO('mysql:host=localhost;dbname=blog', 'read', '');

   if ($getId != 0) {
      $query = <<<EOT
         SELECT  id, title, MONTHNAME(date) AS Month,
         DAY(date) AS Day, YEAR(date) AS Year, body
         FROM posts WHERE id < ? ORDER BY id DESC LIMIT 2
EOT;
      $stmt = $db->prepare($query);
   } else {
      $query = <<<EOT
         SELECT id, title, MONTHNAME(date) AS Month,
         DAY(date) AS Day, YEAR(date) AS Year, body
         FROM posts ORDER BY id DESC LIMIT 2
EOT;

      $stmt = $db->prepare();
      $min_stmt = $db->prepare('SELECT MIN(id) AS min FROM posts');
   }

   $stmt = $db->prepare($query);
   $lastId = $getId;

   echo "<div id='current_top_post'></div>";
   
   if ($stmt->execute([$getId])) {
      while($row = $stmt->fetch()) {
         echo "<div class='row'>\n";
         echo "<div class='post well'>\n";
         echo "<h2>" . $row['title'] . "</h2>";
         echo $row['Month']." ".$row['Day'].", ".$row['Year'];
         echo "<p>" . $row['body'] . "</p>";
         echo "\n</div>\n";
         echo "</div>\n";
         echo "<br/><br/>\n";
         $lastId = $row['id'];
      }
   }

   echo "<div id='last_post_made'>$lastId</div>";
   
   if ($getId == 0) {
      $min_stmt->execute();
      $row = $min_stmt->fetch();
      echo '<div id=\'min_post\'>' . $row['min'] . '</div>';
   }

   // Close connection
   $db = null;
