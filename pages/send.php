<?php 

    if($_POST['sendMoney']){
        extract($_POST);

        if($amount > $_SESSION['mainBalance']){
            echo "
                <div class='alert alert-warning alert-dismissible fade show text-muted text-center' role='alert'>
                    Insufficient Fund. 
                </div>
            ";
        }else{
            $tblquery = "INSERT INTO tbltransaction VALUES(:id, :accNo, :desAcc,
            :amount, :date)";
            $tblvalue = array(
                ':id' => null,
                ':accNo' => htmlspecialchars($_SESSION['accNo']),
                ':desAcc' => htmlspecialchars($_SESSION['destinationAccNo']),
                ':amount' => htmlspecialchars($amount),
                ':date' => strftime("%Y-%m-%d %H:%M:%S", time())
            );
            // print_r($tblvalue);
            $insert = $collect->tbl_insert($tblquery, $tblvalue);
            if($insert){
                echo "<script>window.location='http://localhost/godson/deposit';</script>";
            }
        }
    }

?>

<div class="row justify-content-center">
    <?php
        $tblquery = "SELECT * FROM tblcustomer WHERE accNo = :accNo";
        $tblvalue = array(
            ':accNo' => $_SESSION['destinationAccNo']
        );
        // print_r($tblvalue);
        $select = $collect->tbl_select($tblquery, $tblvalue);
        foreach($select as $data){
            extract($data);
            ?>
            <?php
            $_SESSION['receiver'] = $accName;
            echo "
                <div class='alert alert-warning alert-dismissible fade show text-muted text-center' role='alert'>
                    Are your sure you want to send money to $accName, if yes then complete the transfer process, else click cancel. 
                </div>
            ";
        }

    ?>
</div>

<div class="row">
    <div class="col-md-12 form-CC">
        <form action="send" method="POST">
            <div class="row">
                <div class='col-12 input-group my-2'>
                    <span class='input-group-text w-25'>Amount:</span>
                    <input type='number' name="amount" class="w-75 border-0 bg-light rounded" placeholder="Amount to send" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <a href="deposit" class="btn btn-danger p-2">Cancel</a>
                </div>
                <div class="col-2">
                    <input type="submit" name="sendMoney" class="btn btn-primary" value="Send">
                </div>
            </div>
        </form>
    </div>
</div>
