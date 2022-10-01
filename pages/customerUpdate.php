<?php 

    //Get the Name of the Uploaded File
    $fileName = $_FILES['file']['name'];

    // Choose where to save the Upload File
    $location = "upload/".$fileName;

    // Save the uploaded File to the local file system
    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
        
    }

    // Upload Details to DataBase
    if($_POST['update']){
        extract($_POST);

        $tblquery = "UPDATE tblcustomer SET accName = :accName, email = :email, accType = :accType, 
        address = :address, phone = :phone, dob = :dob, sex = :sex, ms = :ms, nname = :nname, 
        nnum = :nnum, userName = :userName, password = :password
         WHERE customerId = '$_SESSION[customerId]'";
        $tblvalue = array(
            ':accName' => htmlspecialchars(ucwords($name)),
            ':email' => htmlspecialchars($email),
            ':accType' => htmlspecialchars($accType),
            ':address' => htmlspecialchars(ucfirst($address)),
            ':phone' => htmlspecialchars($phone),
            ':dob' => htmlspecialchars($dob),
            ':sex' => htmlspecialchars($sex),
            ':ms' => htmlspecialchars($ms),
            ':nname' => htmlspecialchars($nname),
            ':nnum' => htmlspecialchars($nnum),
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
    if($_POST['updateImage']){
        extract($_POST);

        $tblquery = "UPDATE tblcustomer SET passport = :passport
        WHERE customerId = '$_SESSION[customerId]'";
        $tblvalue = array(
            ':passport' => htmlspecialchars($fileName)
        );
        // print_r($tblvalue);
        $update = $collect->tbl_update($tblquery, $tblvalue);
        if($update){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-muted text-center' role='alert'>
                    <strong>Customer Profile Image</strong> has been Updated.
                </div>
            ";
        }
    }
?>

<div class="row justify-content-center dashboard">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-dark">Update Customer Profile</div>
</div>
<div class="row">
    <div class="col-md-12 form-CC">
        <form action="customerUpdate" method="POST" enctype="multipart/form-data">
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
                                <span class='input-group-text w-25'>Account Name:</span>
                                <input type='text' name='name' class='w-75 border-0' value='$accName' required>
                            </div>
                            <div class='col-12 input-group my-2'>
                                <span class='input-group-text w-25'>Email:</span>
                                <input type='email' name='email' class='w-75 border-0' value='$email' required>
                            </div>
                            <div class='col-12 input-group my-2'>
                                <span class='input-group-text w-25'>UserName:</span>
                                <input type='text' name='userName' class='w-75 border-0' value='$userName' required>
                            </div>
                            <div class='col-12 input-group my-2'>
                                <span class='input-group-text w-25'>Password:</span>
                                <input type='text' name='password' class='w-75 border-0' value='$password' required>
                            </div>
                            <div class='col-12 input-group my-2'>
                                <span class='input-group-text w-25'>Account Type:</span>
                                <select name='accType' class='w-75 border-0' required>
                                    <option value='$accType'>$accType</option>
                                    <option value='Current'>Current</option>
                                    <option value='Fixed Deposit'>Fixed Deposit</option>
                                    <option value='Saving'>Saving</option>
                                </select>
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



<form action="customerUpdate" method="Post" enctype="multipart/form-data">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-dark">Update Customer Profile Image</div>
    </div>
    <div class="row add-image" style="margin-top:-320px;margin-bottom:-300px;">
        <div class="box">
            <div class="row wrapper">
                <div class="col-12">
                    <label for="img">
                        <span><i class="bi bi-cloud-arrow-up-fill"></i></span>
                    </label>
                </div>
                <input type="file" id="img" name="file" class="d-none" required>
                <div class="p-2" id="display-image">No File Selected</div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center" >
        <div class="col-2">
            <input type="submit" name="updateImage" class="btn btn-primary" value="Update Profile Image">
        </div>
    </div>
</form>

<script>
    //Preview Image Name 
    let inputFile = document.getElementById('img');
    let fileName = document.getElementById('display-image');
    inputFile.addEventListener('change', function(event){
        let uploadedFileName = event.target.files[0].name;
        fileName.textContent = uploadedFileName;
    })
</script>