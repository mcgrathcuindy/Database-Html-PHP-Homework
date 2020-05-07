<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $SubjectErr = "";
$name = $email = $gender = $Message = $Subject = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["Subject"])) {
    $Subject = "";
  } else {
    $Subject = test_input($_POST["Subject"]);
    // check if URL address syntax is valid
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$Subject)) {
      $SubjectErr = "Invalid URL";
    }    
  }

  if (empty($_POST["Message"])) {
    $Message = "";
  } else {
    $Message = test_input($_POST["Message"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Subject: <input type="text" name="Subject">
  <span class="error"><?php echo $SubjectErr;?></span>
  <br><br>
  Message: <textarea name="Message" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="Send" value="Send">  
  <input type="submit" name="Reset" value ="reset">
</form>

<?php
$string = "The message sent to";
echo $string;
$name=str_replace("\r\n","",$name);
$email=str_replace("\r\n","",$email);
?>
<br>
<span class="error"><?php echo $name;?></span>
<br>
<?php
echo "With email address";
?>
<br>
<span class="error"><?php echo $email;?></span>
<br>
</body>
</html>