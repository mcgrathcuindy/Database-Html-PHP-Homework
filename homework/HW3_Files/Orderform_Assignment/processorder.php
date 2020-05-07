<?php
  // create short variable names
  $dBOOKS = (int) $_POST['dBOOKS'];
  $cBOOKS = (int) $_POST['cBOOKS'];
  $oBOOKS = (int) $_POST['oBOOKS'];
  $shipAddress = preg_replace('/\t|\R/',' ',$_POST['shipAddress']);
?>
<html>

<body>
<h1>Uindy CSCI Books</h1>

<h2>Order Results</h2>
<?php
    $numBooks = 0;
    $endPrice = 0.00;
    date_default_timezone_set("America/New_York");
    echo "<p>Order processed at ".date('h:i, jS F Y')."</p>";
    echo "<p>Your order is as follows: </p>";
    define('databasePrice', 120);
    define('cplusplusPrice', 80);
    define('osPrice', 150);
    
    $numBooks = $dBOOKS + $cBOOKS + $oBOOKS;
    echo "Items ordered: ".$numBooks."<br />";
   
    echo htmlspecialchars($dBOOKS).' Database Systems<br />';
    echo htmlspecialchars($cBOOKS).' C++ Programming<br />';
    echo htmlspecialchars($oBOOKS).' Operating Systems<br />';
    
    $endPrice = ($dBOOKS * databasePrice) + ($cBOOKS * cplusplusPrice) + ($oBOOKS * osPrice);

    echo "Subtotal: $".number_format($endPrice,2)."<br />";
    $endPrice = $endPrice * 1.1;
    echo "Total including tax: $".number_format($endPrice,2)."<br />";

    echo "<p>Books will be shipped to ".htmlspecialchars($shipAddress)."</p>";

    $outputstring = date('h:i, jS F Y')."\t".$dBOOKS." Databse Systems \t".$cBOOKS." C++ Programming\t".$oBOOKS." Operating Systems\t\$".$endPrice."\t". $shipAddress."\n";
    @$fp = fopen("orders.txt", 'ab');
    if (!$fp) {
      echo "<p><strong> Error opening orders.txt.</strong></p></body></html>";
      exit;
    }
    fwrite($fp, $outputstring, strlen($outputstring));
    fclose($fp);
    echo "<p>Order written.</p>";
?>
</body>