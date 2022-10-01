<?php
    session_start();
    include('config/dataBaseLink.php');
    $collect = new Godson();
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
        <title> Login - Access Bank</title>
        <link rel="shortcut icon" type="image/jpg" href="assets/proPic.png">
        <link rel="stylesheet" href="./styles/stylesheet.css">
    </head>
    <body style="background:#eee;">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 loginBox">
                    <div class="row justify-content-center text-white">
                        <div class="col-md-4 loginSideBox p-0">
                            <div class="row">
                                <div class="col-12" style="height:232px;">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center" style="height:58px;"></div>
                                        <div class="col-12 text-center" style="height:58px;"></div>
                                        <div class="col-12 text-center" style="height:58px;"></div>
                                        <div class="col-11 text-center h2 pt-1 bg-dark" style="height:58px;color:#0f0;">Access</div>
                                    </div>
                                </div>
                                <div class="col-12" style="height:232px;">
                                    <div class="row justify-content-center">
                                        <div class="col-11 text-center h2 pt-1 bg-dark" style="height:58px;color:#0f0;">Bank</div>
                                        <div class="col-12 text-center" style="height:58px;"></div>
                                        <div class="col-12 text-center" style="height:58px;"></div>
                                        <div class="col-12 text-center" style="height:58px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 loginRightBox">
                            <form action="login.php" method="POST">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 my-5">
                                        <div class="row justify-content-center mainFormBox">
                                            <div class="col-md-10 form-group mt-5">
                                                <label for="username" class="form-label">Username:</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                                    <input type="text"  name="username" id="username" class="form-control" placeholder="Please enter username">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="Please enter your username">
                                                        <span class="input-group-text"><i class="bi bi-question-circle"></i></span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="col-md-10 form-group mt-5">
                                                <label for="password" class="form-label">password:</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                                    <input type="password"  name="password" id="password" class="form-control" placeholder="Please enter password">
                                                    <span data-bs-toggle="tooltip" data-bs-placement="right" title="Please enter your Password">
                                                        <span class="input-group-text"><i class="bi bi-question-circle"></i></span>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="my-5 text-center">
                                                <input type="submit" name="login" class="btn btn-primary" value="Login">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./js/main.js"></script>
    </body>
</html>

<?php
    if($_POST['login']){
        extract($_POST);
        $tblquery = "SELECT * FROM tbluserlogin WHERE userName = :user && ( password = :pass || passCode = :pass )";
        $tblvalue = array(
            ':user' => htmlspecialchars($username),
            ':pass' => htmlspecialchars($password)
        );
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                $_SESSION['customerId'] = $customerId;
                $_SESSION['username'] = $userName;
                $_SESSION['level'] = $level;

                header('Location: dashboard');
                echo '<script> window.location="dashboard"; </script>'; 
            }
        }else{
            echo "
                <div class='container'>
                    <div class='row justify-content-center'>
                        <div class='col-md-8 mt-2 alert alert-danger alert-dismissible fade show text-muted text-center' role='alert'>
                            Ooops Something went wrong. Please check if your password and Username are 
                            correctly spelt, Or if the error persist it may be that your account has been Disabled.
                        </div>
                    </div>
                </div>
            ";
        }
    }
?>