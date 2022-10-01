
<div class="row align-items-center bg-info">
    <div class="col-3 bg-info p-0">
        <div class="row justify-content-center m-0">
            <div class="col-11 m-0 my-2 p-0 justify-content-center">
                <?php
                    $tblquery = "SELECT * FROM tblcustomer WHERE customerId = '$_SESSION[customerId]'";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        echo "
                            <img src='upload/$passport' class='m-0' style='height:200px;width:100%' alt='Customer Picture'>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="col-9">
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
                            <span class='input-group-text w-25'>Name:</span>
                            <input type='text' class='w-75 border-0' value='$accName' readonly>
                        </div>
                    ";
                }
            ?>
        </div>
        <div class="row">
            <?php
                $tblquery = "SELECT sum(amount) as balance FROM tblaccount WHERE customerId = '$_SESSION[customerId]'";
                $tblvalue = array();
                $select = $collect->tbl_select($tblquery, $tblvalue);
                foreach($select as $data){
                    extract($data);
                    ?>
                    <?php
                    echo "
                        <div class='col-12 input-group my-2'>
                            <span class='input-group-text w-25'>Balance:</span>
                            <input type='text' class='w-75 border-0' value='$_SESSION[mainBalance]' readonly>
                        </div>
                    ";
                }
            ?>
        </div>
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
                            <span class='input-group-text w-25'>Account No:</span>
                            <input type='text' class='w-75 border-0' value='$accNo' readonly>
                        </div>
                        <div class='col-12 input-group my-2'>
                            <span class='input-group-text w-25'>Account Type:</span>
                            <input type='text' class='w-75 border-0' value='$accType' readonly>
                        </div>
                        <div class='col-12 input-group my-2'>
                            <span class='input-group-text w-25'>Mobile No:</span>
                            <input type='text' class='w-75 border-0' value='$phone' readonly>
                        </div>
                        <div class='col-12 input-group my-2'>
                            <span class='input-group-text w-25'>Username:</span>
                            <input type='text' class='w-75 border-0' value='$userName' readonly>
                        </div>
                        <div class='col-12 input-group my-2'>
                            <span class='input-group-text w-25'>Registration Date:</span>
                            <input type='date' class='w-75 border-0' value='$date' readonly>
                        </div>
                    ";
                }
            ?>
        </div>
    </div>
</div>

<div class="row bg-info p-2">
    <div class="col-12 input-group my-2" style="min-height:420px;">
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
                        <span class='input-group-text w-25'>Email:</span>
                        <input type='email' class='w-75 border-0' value='$email' readonly>
                    </div>
                    <div class='col-12 input-group my-2'>
                        <span class='input-group-text w-25'>DOB:</span>
                        <input type='text' class='w-75 border-0' value='$dob' readonly>
                    </div>
                    <div class='col-12 input-group my-2'>
                        <span class='input-group-text w-25'>Sex:</span>
                        <input type='text' class='w-75 border-0' value='$sex' readonly>
                    </div>
                    <div class='col-12 input-group my-2'>
                        <span class='input-group-text w-25'>Marital Status:</span>
                        <input type='text' class='w-75 border-0' value='$ms' readonly>
                    </div>
                    <div class='col-12 input-group my-2'>
                        <span class='input-group-text w-25'>Name: Next Of Kin:</span>
                        <input type='text' class='w-75 border-0' value='$nname' readonly>
                    </div>
                    <div class='col-12 input-group my-2'>
                        <span class='input-group-text w-25'>Number: Next Of Kin:</span>
                        <input type='text' class='w-75 border-0' value='$nnum' readonly>
                    </div>
                    <span class='input-group-text w-25'>Address:</span>
                    <textarea class='p-1 w-75 border-0 justify' style='min-height:100px;'>$address</textarea>
                ";
            }
        ?>
        
    </div>
</div>

<div class="row justify-content-center m-3">
    <div class="col-2 text-center">
        <a href="listOfCustomer" class="btn btn-primary btn-lg">Go Back</a>
    </div>
</div>


