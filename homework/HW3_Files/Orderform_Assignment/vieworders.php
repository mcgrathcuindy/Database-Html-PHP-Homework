<html>
<body>
<h1>Uindy CSCI Books</h1>
<h2>Customer Orders</h2>
<?php

   @$fp = fopen("orders.txt", 'rb');
   if (!$fp) {
     echo "<p><strong>Error opening orders.txt</strong></p>";
     exit;
   }

   while (!feof($fp)) {
      $customerTuple= fgets($fp);
      echo htmlspecialchars($customerTuple)."<br />";
   }
  fclose($fp); 
?>
</body>
</html>