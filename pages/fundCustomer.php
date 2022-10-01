<?php 

    if($_POST['credit']){
        extract($_POST);

        $details = $customer;
        $arrayString= explode(" ", $details );

        $customerId = $arrayString[0];
        $accNo = $arrayString[1];

        $tblquery = "INSERT INTO tbltransaction VALUES(:id, :accNo, :destAcc, :amount, :date)";
        $tblvalue = array(
            ':id' => null,
            ':accNo' => htmlspecialchars("Internal"),
            ':destAcc' => htmlspecialchars($accNo),
            ':amount' => htmlspecialchars(ucwords($amount)),
            ':date' => date("Y-m-d")
        );
        // print_r($tblvalue);
        $insert = $collect->tbl_insert($tblquery, $tblvalue);
        if($insert){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-muted text-center' role='alert'>
                    <strong>Customer</strong> has been credited.
                </div>
            ";
        }
    }

?>

<div class="row justify-content-center">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-muted">Choose Customer to Credit</div>
</div>

<div class="row">
    <div class="col-md-12 form-CC">
        <form action="fundCustomer" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class='col-12 input-group my-2'>
                    <span class='input-group-text w-25'>Choose Customer:</span>
                    <select name='customer' class='w-75 border-0 bg-light rounded' required>
                        <option value="">Choose Customer to Credit</option>
                        <?php
                            $tblquery = "SELECT * FROM tblcustomer WHERE level = :level ORDER BY accName";
                            $tblvalue = array(
                                ':level' => 'Customer'
                            );
                            $select = $collect->tbl_select($tblquery, $tblvalue);
                            foreach($select as $data){
                                extract($data);
                            ?>
                                <?php
                                echo "
                                    <option value='$customerId $accNo'>$accName $customerId</option>
                                ";
                            }
                        ?>
                    </select>
                </div> 
                <div class='col-12 input-group my-2'>
                    <span class='input-group-text w-25'>Amount $:</span>
                    <input type='number' name="amount" class="w-75 border-0 bg-light rounded" required>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-2">
                    <input type="submit" name="credit" class="btn btn-primary" value="Credit">
                </div>
            </div>
        </form>
    </div>
</div>
