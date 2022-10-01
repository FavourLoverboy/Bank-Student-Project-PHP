<?php
    session_start();
    include('config/dataBaseLink.php');
    $collect = new Godson();
?>
<?php
    if($_POST['submit']){

        extract($_POST);

        $tblquery = "SELECT * FROM tblcustomer WHERE passCode = $password";
        $tblvalue = array();
        // print_r($tblquery);
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if(!$select){
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-muted text-center' role='alert'>
                    Your One Time Pass Code is not recognize.
                </div>
            ";
        }else{
            $_SESSION['OneTimePassword'] = $password;

            // echo "<h1> $_SESSION[OneTimePassword] </h1>";

            echo "<script> window.location='http://localhost/godson/accountUpdate.php'; </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
        <title> Validate - Godson</title>
        <link rel="shortcut icon" type="image/jpg" href="assets/proPic.png">
        <link rel="stylesheet" href="./styles/stylesheet.css">
    </head>
    <body style="background:#eee;">

        <div class="row justify-content-center dashboard">
            <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-dark">Verify Your Account</div>
        </div>
        <div class="container">
            <form action="validate.php" method="POST">
                <div class="row justify-content-center">
                    <div class="col-12 bg-info input-group my-2">
                        <span class="input-group-text w-25">PassCode:</span>
                        <input type="password" name="password" class="w-75 border" placeholder="Enter One Time Pass Code" required>
                    </div>
                    <div class="col-2">
                        <input type="submit" name="submit" class="w-100 btn btn-primary" value="Verify">
                    </div>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./js/main.js"></script>
    </body>
</html>