<?php
   $q = intval($_GET['q']); // q = 0 if no q request

   // Create Connection
   $con=mysqli_connect("localhost", "read",  "", "blog");

   // Check connection
   if (mysqli_connect_errno($con))
   { 
      echo "Failed to connect to MYSQL: " . mysqli_connect_error();
   }

   if ($q != 0)
   {
      $result = mysqli_query($con,"SELECT  id, title, MONTHNAME(datePosted) AS Month,
                                   DAY(datePosted) AS Day, YEAR(datePosted) AS Year, body
                                   FROM Posts WHERE id < ".$q." ORDER BY id DESC LIMIT 2");
   }
   else
   {
      $result = mysqli_query($con,"SELECT id, title, MONTHNAME(datePosted) AS Month,
                                   DAY(datePosted) AS Day, YEAR(datePosted) AS Year, body 
                                   FROM Posts ORDER BY id DESC LIMIT 2");

      $min = mysqli_query($con, "SELECT MIN(id) FROM Posts");
   }

   $lastId = $q;

   echo "<div id='current_top_post'></div>";
   
   while($row = mysqli_fetch_array($result))
   {
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

   echo "<div id='last_post_made'>".$lastId."</div>";
   
   if ($q == 0) 
   {
      $row = mysqli_fetch_array($min);
      echo "<div id='min_post'>".$row['MIN(id)']."</div>";
   }

   mysqli_close($con);
?>
