<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Zakaz | Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <?php 

        include "pages/konekcija.php";

        //Proverava da li se poklapa ponovljena lozinka
    if(isset($_POST['username']) && isset($_POST['password'])){
    // $username = mysql_real_escape_string(stripslashes($_POST['username']));
    // $password = mysql_real_escape_string(stripslashes($_POST['password']));

        $username = $_POST['username'];
    $password = $_POST['password'];

    $upit="SELECT * FROM user WHERE username='".$username ."' AND password='".$password."' LIMIT 1";

    //Provera da li je nastala greska pri izvodjenju upita
    if (!$u=mysqli_query($baza, $upit))
    {
    echo "<p>Nastala je greška pri izvođenju upita</p>";
    }

    //Provera da li je upit vratio neki rezultat
    if (mysqli_num_rows($u)==0)
        {
        echo "<p>Uneli ste pogrešne podatke.</p>";
        } 
    else {
        $red=mysqli_fetch_array($u);
    
        $userID = $red['ID'];
        $username = $red['username'];
        
        //Startovanje sesije i redirekcija na stranicu home.php
        session_start();
        $_SESSION['login'] = "go";
        $_SESSION['userID'] = $userID;
        $_SESSION['username'] = $username;
        header("Location: pages/home.php"); 
        }
}


        ?>

        <div class="form-box" id="login-box">
            <div class="header">Log In</div>
            <form action="index.php" method="post">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Korisničko ime"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Lozinka"/>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Uloguj me</button>  
                </div>
            </form>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>