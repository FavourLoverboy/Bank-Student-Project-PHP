<?php 
    //Get the Name of the Uploaded File
    $fileName = $_FILES['file']['name'];

    // Choose where to save the Upload File
    $location = "upload/".$fileName;

    // Save the uploaded File to the local file system
    if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
        
    }

    // Upload Details to DataBase
    if($_POST['submit']){
        extract($_POST);

        function generateRandomString($length = 25) {
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $_SESSION['customerIds'] = generateRandomString(10);

        $first = $name;
        $userName = strtok($first, " ");
        $password = generateRandomString(6);
        $passCode = generateRandomString(3);

        $tblquery = "INSERT INTO tblcustomer VALUES(:id, :customerId, :accNo, :accName, :email,
        :accType, :address, :phone, :dob, :sex, :ms, :nname, :nnum, :userName, :password, 
        :passCode, :level, :passport, :date)";
        $tblvalue = array(
            ':id' => null,
            ':customerId' => htmlspecialchars($_SESSION['customerIds']),
            ':accNo' => htmlspecialchars(time()),
            ':accName' => htmlspecialchars(ucwords($name)),
            ':email' => htmlspecialchars($email),
            ':accType' => htmlspecialchars($accType),
            ':address' => htmlspecialchars(ucfirst($address)),
            ':phone' => htmlspecialchars($phone),
            ':dob' => htmlspecialchars($dob),
            ':sex' => htmlspecialchars($sex),
            ':ms' => htmlspecialchars($ms),
            ':nname' => htmlspecialchars(ucwords($nname)),
            ':nnum' => htmlspecialchars($nnum),
            ':userName' => htmlspecialchars(ucwords($userName)),
            ':password' => htmlspecialchars($password),
            ':passCode' => htmlspecialchars($passCode),
            ':level' => htmlspecialchars('Customer'),
            ':passport' => htmlspecialchars($fileName),
            ':date' => date("Y-m-d")
        );
        // print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-muted text-center' role='alert'>
                    <strong>Customer</strong> has been created.
                </div>
            ";


            $email = "favourehio2019@gmail.com";
            $password = "Loverboy123,.";
            $sender_name = "Bank";
            $message = "message content";
            $recipients = $phone;
            

            $data = array("email" => $email, "password" => $password,"message"=>$message, "sender_name"=>$sender_name,"recipients"=>$recipients);
            $data_string = json_encode($data);
            $ch = curl_init('hhttps://api.80kobosms.com/v2/app/sms');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
            $result = curl_exec($ch);
            $res_array = json_decode($result);
            print_r($res_array);

            $tblquery = "INSERT INTO tbluserlogin VALUES(:id, :customerId, :userName, :password, :passCode, :level)";
            $tblvalue = array(
                ':id' => null,
                ':customerId' => $_SESSION['customerIds'],
                ':userName' => htmlspecialchars($userName),
                ':password' => htmlspecialchars($password),
                ':passCode' => htmlspecialchars($passCode),
                ':level' => htmlspecialchars('Customer')
            );
            // print_r($tblvalue);
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
        }
    }
?>

<div class="row justify-content-center dashboard">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-dark">Create Customer</div>
</div>
<div class="row">
    <div class="col-md-12 form-CC">
        <form action="createCustomer" method="POST" enctype="multipart/form-data">
            <div class="row">
                
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Customer Name:</span>
                    <input type="text" name="name" class="w-75 border-0 bg-light rounded" placeholder="Enter customer name..." required>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Customer Email:</span>
                    <input type="email" name="email" class="w-75 border-0 bg-light rounded" placeholder="Enter customer email..." required>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Account Type:</span>
                    <select name="accType" class="w-75 border-0 bg-light rounded" required>
                        <option value="">Choose Account Type</option>
                        <option value="Current">Current</option>
                        <option value="Fixed Deposit">Fixed Deposit</option>
                        <option value="Saving">Saving</option>
                    </select>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Mobile Number:</span>
                    <input type="number" name="phone" class="w-75 border-0 bg-light rounded" placeholder="Enter customer mobile number..." required>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>DOB:</span>
                    <input type="date" name="dob" class="w-75 border-0 bg-light rounded" placeholder="Enter date of birth..." required>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Gender:</span>
                    <select name="sex" class="w-75 border-0 bg-light rounded" required>
                        <option value="">Choose Gender</option>
                        <option value="Female">Female</option>
                        <option value="Male">Male</option>
                    </select>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Marital Status:</span>
                    <select name="ms" class="w-75 border-0 bg-light rounded" required>
                        <option value="">Choose Marital Status</option>
                        <option value="Divorce">Divorce</option>
                        <option value="Married">Married</option>
                        <option value="Single">Single</option>
                        <option value="Widow">Widow</option>
                        <option value="Widower">Widower</option>
                    </select>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Customer's Address:</span>
                    <textarea name="address" class="w-75 border-0 bg-light rounded" required></textarea>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Name: Next of Kin:</span>
                    <input type="text" name="nname" class="w-75 border-0 bg-light rounded" placeholder="Enter name..." required>
                </div>
                <div class="col-12 input-group my-2">
                    <span class='input-group-text w-25'>Number: Next of Kin:</span>
                    <input type="phone" name="nnum" class="w-75 border-0 bg-light rounded" placeholder="Enter number..." required>
                </div>
            </div>
            <div class="row add-image" style="margin-top:-200px;">
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
            <div class="row justify-content-center" style="margin-top:-170px;">
                <div class="col-2">
                    <input type="submit" name="submit" class="btn btn-primary" value="Create">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    //Preview Image Name 
    let inputFile = document.getElementById('img');
    let fileName = document.getElementById('display-image');
    inputFile.addEventListener('change', function(event){
        let uploadedFileName = event.target.files[0].name;
        fileName.textContent = uploadedFileName;
    })
</script>
