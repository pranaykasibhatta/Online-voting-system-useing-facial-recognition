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
            button{
            background-color: blue;
            color:white;
            font-weight: bold;
            width: 30%;
            height: 100%;
            cursor:pointer;
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
            table{
                margin:10% 10% 20% 20%;
                border:solid;
            }
            th{
                border: solid;
                width:20%;
                height:100%;
                text-align:center;
                color:white;
                background-color:black; 
            }
            td{
                text-align:center;
                width:10%;
                padding:5% 5% 5% 2%;
                border:solid;
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
        <form method="post">
        <table>
            <tr>
                <th>SNO.</th>
                <th>NAME</th>
                <th>VOTE</th>
            </tr>
            <tr>
                <td>1</td>
                <td>
                    BPJ - NARENDRA MODI
                </td>
                <td>
                    <button type="submit" name="member" value='narendra modi'>VOTE</button>
                </td>
            </tr>
            <tr>
                <td >2</td>
                <td>
                  AAP - ARVIND KEJRIWAL
                </td>
                <td>
                    <button type="submit" name="member" value=' arvind kejriwal'>VOTE</button>
                </td>
            </tr>
            <tr>
                <td >3</td>
                <td>
                  INC - RAHUL GANDHI
                </td>
                <td>
                    <button type="submit" name="member" value='rahul gandhi'>VOTE</button>
                </td>
            </tr>
        </table>
        </form>
        <?php
        if(isset($_POST['member'])){
            $s=$_GET['value'];
            $server_name="localhost";
            $username="root";
            $password="";
            $database_name="vote";
            $conn=mysqli_connect($server_name,$username,$password,$database_name);
            $g=$_POST['member'];
            $query1="UPDATE voting SET name1='$g',status1=1 WHERE email='$s'";
            $re=mysqli_query($conn,$query1);
            if($re){
                echo '<script>alert("You have voted");window.location.href="otp_send.php"</script>';
            }
        }
        ?>
        
    </body>
</html>