<?php
    //$id = $_GET["id"];
    $id = $_POST["id"];

    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $tel = $_POST["tel"];
    $snsurl = $_POST["snsurl"];
    $email1  = $_POST["email1"];
    $email2  = $_POST["email2"];

    $email = $email1."@".$email2;
          
    $con = mysqli_connect("localhost", "root", "1234", "smartita");
    $sql = "update members set pass='$pass', name='$name' , tel='$tel', snsurl='$snsurl', email='$email'";
    $sql .= " where id='$id'";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'index.php';
	      </script>
	  ";
?>

   
