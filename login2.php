
<?php
$connect=mysqli_connect("sql9.freesqldatabase.com","sql9539300","EK5Zblgarx","sql9539300") or die("Connection Failed");
if(!empty($_POST['submit']))
{
    $email = $_POST['email'];
    $password=$_POST['password'];
    $query="select * from form where email='$email' and password='$password'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        header('Location: login3.html');
    }
    else{
       echo "Invalid";
        header('Location: login1.php');
    }
    
}
?>





