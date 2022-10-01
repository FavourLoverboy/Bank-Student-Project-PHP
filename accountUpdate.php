<?php
    session_start();
    include('config/dataBaseLink.php');
    $collect = new Godson();
 
?>
<?php
    // Upload Details to DataBase
    if($_POST['update']){
        extract($_POST);

        $tblquery = "UPDATE tblcustomer SET accName = :accName, email = :email, address = :address, 
        phone = :phone, dob = :dob, sex = :sex, ms = :ms, nname = :nname, 
        nnum = :nnum WHERE passCode = '$_SESSION[OneTimePassword]'";
        $tblvalue = array(
            ':accName' => htmlspecialchars(ucwords($name)),
            ':email' => htmlspecialchars($email),
            ':address' => htmlspecialchars(ucfirst($address)),
            ':phone' => htmlspecialchars($phone),
            ':dob' => htmlspecialchars($dob),
            ':sex' => htmlspecialchars($sex),
            ':ms' => htmlspecialchars($ms),
            ':nname' => htmlspecialchars($nname),
            ':nnum' => htmlspecialchars($nnum)
        );
        // print_r($tblvalue);
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-muted text-center' role='alert'>
                    <strong>Customer Profile</strong> has been Updated.

                    <a href='dashboard' class='btn btn-primary my-2'>Back</a>
                </div>
            ";

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
        <title> Account Update - Godson</title>
        <link rel="shortcut icon" type="image/jpg" href="assets/proPic.png">
        <link rel="stylesheet" href="./styles/stylesheet.css">
    </head>
    <body style="background:#eee;">

        <div class="row justify-content-center dashboard">
            <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-dark">Update Your Profile</div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 form-CC">
                    <form action="accountUpdate.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <?php
                                $urlOne = $url[1];
                                echo $urlOne; 
                                $tblquery = "SELECT * FROM tblcustomer WHERE passCode = '$_SESSION[OneTimePassword]'";
                                $tblvalue = array();
                                // print_r($tblquery);
                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                foreach($select as $data){
                                    extract($data);
                                    ?>
                                    <?php
                                    echo "
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Account Name:</span>
                                            <input type='text' name='name' class='w-75 border-0' value='$accName' required>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Email:</span>
                                            <input type='email' name='email' class='w-75 border-0' value='$email' required>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Mobile Number:</span>
                                            <input type='text' name='phone' class='w-75 border-0' value='$phone' required>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Date Of Birth:</span>
                                            <input type='date' name='dob' class='w-75 border-0' value='$dob' required>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Sex:</span>
                                            <select name='sex' class='w-75 border-0' required>
                                                <option value='$sex'>$sex</option>
                                                <option value='Female'>Female</option>
                                                <option value='Male'>Male</option>
                                            </select>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Marital Status:</span>
                                            <select name='ms' class='w-75 border-0' required>
                                                <option value='$ms'>$ms</option>
                                                <option value='Divorce'>Divorce</option>
                                                <option value='Married'>Married</option>
                                                <option value='Single'>Single</option>
                                                <option value='Widow'>Widow</option>
                                                <option value='Widower'>Widower</option>
                                            </select>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Name: Next of Kin:</span>
                                            <input type='text' name='nname' class='w-75 border-0' value='$nname' required>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Number: Next of Kin:</span>
                                            <input type='number' name='nnum' class='w-75 border-0' value='$nnum' required>
                                        </div>
                                        <div class='col-12 input-group my-2'>
                                            <span class='input-group-text w-25'>Address:</span>
                                            <textarea name='address' class='w-75 border-0' required>$address</textarea>
                                        </div>
                                    ";
                                }
                            ?>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-2">
                                <input type="submit" name="update" class="btn btn-primary mb-5" value="Update Profile">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="./js/main.js"></script>
    </body>
</html>

<script>
    //Preview Image Name 
    let inputFile = document.getElementById('img');
    let fileName = document.getElementById('display-image');
    inputFile.addEventListener('change', function(event){
        let uploadedFileName = event.target.files[0].name;
        fileName.textContent = uploadedFileName;
    })
</script>