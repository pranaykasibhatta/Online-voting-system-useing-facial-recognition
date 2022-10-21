<html>
    <head>
    <script type="text/javascript">
            function preventBack(){window.history.forward()};
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
        <style> 
            input{
                float:left;
                padding: 7px;
                width: 100%;
                background-color:lavender;
                font-weight: bold;
            }
            input[type=submit]{
                border-radius:16px;
            background-color: #45a049;
            font-weight: bold;
            width: 100%;
            height: 10%;
            }
            .card {
            align-items: center ;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,2);
            width: 30%;
            height: 42%;
            margin :auto;
            margin-top:10%;
            background-image: url(bg.jpg);
            background-repeat: no-repeat;
            }
            .container {
            padding: 30px 20px ;
            }
            
        </style>
        <link rel="stylesheet" href="style.css">
    </head>
    <body >
        <nav>
            <label class="logo">ONLINE VOTING SYSTEM</label>
            <ul>
                <li><a href="http://localhost/votingsystem/otp_send.php">VOTE</a></li>
                <li><a href="http://localhost/votingsystem/register1.php">REGISTER</a></li>
                <li><a  href="http://localhost/votingsystem/result.php">RESULT</a></li>
            </ul></nav>  
        <div class="card" style="text-align: center;">
            <div class="container">
                <form method="post">
                <input type="text" value="" name="name" required placeholder="Enter Name" size=50><br><br><br>
                <input type="number" value="" name="aadhar" required placeholder="aadhaar no" size=50 ><br><br><br>
                <input type="number" value="" name="phone" required placeholder="Enter mobile" size=50><br><br><br>
                <input type="email" value="" name="email" required placeholder="Enter email" size=50><br><br><br>
                <input type="submit" value="Submit" name="save">
        </form>
        <?php
        if(isset($_POST['name'])&& isset($_POST['aadhar'])&&isset($_POST['phone'])&&isset($_POST['email'])){
$server_name="localhost";
$username="root";
$password="";
$database_name="vote";
$conn=mysqli_connect($server_name,$username,$password,$database_name);
if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}
if(isset($_POST['save'])){
    $name=$_POST['name'];
    $aadhar=$_POST['aadhar'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    if(strlen((string)$aadhar)==12 && strlen((string)$phone)==10){
    $sql_query="INSERT INTO register (sname,aadhar,mobile,email) VALUES ('$name','$aadhar','$phone','$email')";
    $result=mysqli_query($conn,$sql_query);
    if($result){
        $sql_query1="INSERT INTO otp (email,otp) VALUES('$email',1)";
        $re=mysqli_query($conn,$sql_query1);
        if($re){
        $sql_query2="INSERT INTO voting (email,name1,status1) VALUES('$email','1',0)";
        $re1=mysqli_query($conn,$sql_query2);
        if($re1){
            header("Location: http://localhost/face-recognition-login-system-master/face-recognition-login-system-master/login.html");
        }
        }
    }   
    else{
        echo '<script>alert("Unsuccessfull")</script>';
    }
    }
    else{
        echo '<script>alert("invalid mobile number or aadhar number")</script>';
    }
    
    mysqli_close($conn);
}
}
?>
    </body>
</html>