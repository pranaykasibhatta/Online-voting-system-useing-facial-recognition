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
            width: 20%;
            height: 20%;
            }
            .card{
            align-items: center ;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,2);
            width: 30%;
            height: 20%;
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
                <li><a href="http://localhost/votingsystem/result.php">RESULT</a></li>
            </ul></nav>  
        <div class="card" style="text-align: center;">
            <div class="container">
                <form method="post">
                <input type="email" value="" name="email" required placeholder="Enter email" size=50><br><br><br>
                <input type="submit" value="Send OTP" name="save"><br><br><br>

        </form>
        <?php
        if(isset($_POST['email'])){
            $server_name="localhost";
            $username="root";
            $password="";
            $database_name="vote";
            $conn=mysqli_connect($server_name,$username,$password,$database_name);
            if(isset($_POST['save'])){
                $email=$_POST['email'];
                $query="SELECT email FROM otp where email='$email'";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);
                if($count>0){
                $random_otp=rand(10000,99999);
                $receiver = $email;
                $subject = "OTP for online voting";
                $body = "otp is:".$random_otp;
                $sender = "From:19951A05D0@iare.ac.in";
                $query="SELECT status1 from voting where email='$receiver'";
                $re1=mysqli_query($conn,$query);
                $result=mysqli_fetch_array($re1,MYSQLI_ASSOC);
                if($result['status1']=='0'){
                if(mail($receiver, $subject,$body, $sender)){
                    $query1="UPDATE otp SET otp='$random_otp' WHERE email='$email'";
                    $re=mysqli_query($conn,$query1);
                    header( "Location: http://localhost/votingsystem/otp.php?value=$receiver" );
                }
                else{
                    echo '<script>alert("email not found")</script>';
                }
                }
                else{
                    echo '<script>alert("You have voted")</script>';
                }
            }
        }
    }
        ?>
    </body>
</html>
    