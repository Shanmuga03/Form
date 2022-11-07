<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="st.css">
    <link href=
'https://fonts.googleapis.com/css?family=Sofia' 
          rel='stylesheet' />
          <style>
            h3{
                font-family: Sans-serif;
                color: rgb(154, 39, 39);
            }
          </style>
          <script src="login1.js"></script>
</head>
<body>
    
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    if ( isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['email']) &&  isset($_POST['password'])) {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $host = "sql9.freesqldatabase.com";
        $dbUsername = "sql9539300";
        $dbPassword = "EK5Zblgarx";
        $dbName = "sql9539300";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM form WHERE email = ? LIMIT 3";
            $Insert = "INSERT INTO form( fname, lname, email, password) values(?, ?, ?, ?)";

            $jname=array(array(
                'fname' => $fname,
                'lname' => $lname,
                'email'=> $email,
                'password' => $password
            ));

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();
                
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssss", $fname, $lname, $email, $password);

                $Select = "select * from form";
                $result = $conn-> query($Select);
                $data = $result -> fetch_all(MYSQLI_ASSOC);
                file_put_contents("res.json", json_encode($data) );

                if ($stmt->execute()) {
                    echo "Registered";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Already registered using this email.";
            }
            $stmt->close();
            $conn->close();
           
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
?>


<div class="head">
                <div class="form-box">
             <form action="login2.php" method="POST" class = "ajax-submit-onchange">
              <div class="button-box">
                <h3>Sign in</h3>
            </div>
              <table>
                <form id="login" class="input-group">
                <div class="input-field1">
               <tr>
                <td></td>
                <td><input type="email" id="email" class="input-field1" name="email" placeholder="Email" required></td>
               </tr>
               <tr>
                <td></td>
                <td><input type="password" id="password" class="input-field1" name="password" placeholder="Password" required></td>
               </tr>
               </div>
               </form>
               <tr>
                <td><button type="submit" onclick="login1()" class="submit-btn1" value="submit" name="submit">Login</td></button>
              </table>
             </form>
  <br>
  </div>
  </div>
  </div>


