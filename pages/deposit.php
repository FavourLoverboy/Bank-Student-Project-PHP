<?php 

    if($_POST['send']){
        extract($_POST);

        $tblquery = "SELECT * FROM tblcustomer WHERE accNo = :accNo";
        $tblvalue = array(
            ':accNo' => $accNo
        );
        // print_r($tblvalue);
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            if($accNo == $_SESSION['accNo']){
                echo "
                    <div class='alert alert-danger alert-dismissible fade show text-muted text-center' role='alert'>
                        This is your <strong>Account</strong> number, Choose a Destination account.
                    </div>
                ";
            }else{
                $_SESSION['destinationAccNo'] = $accNo;
                echo "<script>window.location='http://localhost/godson/send';</script>";
            }
        }else{
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-muted text-center' role='alert'>
                    This <strong>Account</strong> does not Exit.
                </div>
            ";
        }
    }

?>

<div class="row justify-content-center">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-muted">Send Money</div>
</div>

<div class="row">
    <div class="col-md-12 form-CC">
        <form action="deposit" method="POST">
            <div class="row">
                <div class='col-12 input-group my-2'>
                    <span class='input-group-text w-25'>Account No:</span>
                    <input type='number' name="accNo" class="w-75 border-0 bg-light rounded" placeholder="Destination Account Number" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <input type="submit" name="send" class="btn btn-primary" value="Proceed">
                </div>
            </div>
        </form>
    </div>
</div>
