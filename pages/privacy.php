<?php 

    // Upload Details to DataBase
    if($_POST['update']){
        extract($_POST);

        $tblquery = "UPDATE tblcustomer SET userName = :userName, password = :password
         WHERE customerId = '$_SESSION[customerId]'";
        $tblvalue = array(
            ':userName' => htmlspecialchars($userName),
            ':password' => htmlspecialchars($password)
        );
        // print_r($tblvalue);
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-muted text-center' role='alert'>
                    <strong>Customer Profile</strong> has been Updated.
                </div>
            ";

            $tblquery = "UPDATE tbluserlogin SET userName = :userName, password = :password
            WHERE customerId = '$_SESSION[customerId]'";
            $tblvalue = array(
                ':userName' => htmlspecialchars($userName),
                ':password' => htmlspecialchars($password)
            );
            // print_r($tblvalue);
            $update = $collect->tbl_update($tblquery, $tblvalue);
            if($update){
        
            }
        }
    }



    if($_POST['profile']){
        echo "
            <div class='alert alert-success alert-dismissible fade show text-muted text-center' role='alert'>
                Check your Email for verification.
            </div>
        ";


    }
?>

<div class="row justify-content-center dashboard">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-dark">Update Customer Profile</div>
</div>
<div class="row">
    <div class="col-md-12 form-CC">
        <form action="privacy" method="POST" enctype="multipart/form-data">
            <div class="row">
                <?php
                    $tblquery = "SELECT * FROM tblcustomer WHERE customerId = '$_SESSION[customerId]'";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        echo "
                            <div class='col-12 input-group my-2'>
                                <span class='input-group-text w-25'>UserName:</span>
                                <input type='text' name='userName' class='w-75 border-0' value='$userName' required>
                            </div>
                            <div class='col-12 input-group my-2'>
                                <span class='input-group-text w-25'>Password:</span>
                                <input type='text' name='password' class='w-75 border-0' value='$password' required>
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

<div class="row justify-content-center">
    <div class="col-12">
        <div class='alert alert-warning alert-dismissible fade show text-muted text-center' role='alert'>
        <i class="bi bi-exclamation-triangle-fill"></i> if you want to edit your profile click the button below.
        </div>
    </div>
    <form action="privacy" method="POST">
        <div class="row justify-content-center">
            <div class="col-2">
                <input type="submit" name="profile" class="btn btn-info mb-5 text-white" value="Send Link">
            </div>
        </div>
    </form>
</div>