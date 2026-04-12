<?php
if (isset($_POST['email'])) {
    $email = $_POST['email'];
    echo "<p>Your email is: " . $email . "</p>";
}else{
 ?>

<!doctype html>
<html>
  <head>
    <title>Task 2 - a</title>
  </head>
  <body>
    <form action="" method="post">
      <fieldset>
        <legend><b>EMAIL</b></legend>
        <input type="email" name="email" />
        <br /><br />
        <input type="submit" value="Submit" />
      </fieldset>
    </form>
  </body>
</html>
<?php
}
