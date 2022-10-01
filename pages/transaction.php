<?php
    $tblquery = "SELECT * FROM tblcustomer WHERE accNo = '$_SESSION[sentTo]'";
    $tblvalue = array();
    $select = $collect->tbl_select($tblquery, $tblvalue);
    foreach($select as $data){
        extract($data);
        ?>
        <?php
        $_SESSION['sentToName'] = $accName;
    }


    $tblquery = "SELECT * FROM tblcustomer WHERE accNo = '$_SESSION[sentFrom]'";
    $tblvalue = array();
    $select = $collect->tbl_select($tblquery, $tblvalue);
    foreach($select as $data){
        extract($data);
        ?>
        <?php
        $_SESSION['sentFromName'] = $accName;
    }
?>


<div class="row justify-content-center">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-muted">Your Transactions</div>
</div>

<div class="row">
    <div class="col-8"></div>
    <div class="col-4">
        <div class='col-12 input-group my-2'>
            <span class='input-group-text w-25'>Balance:</span>
            <input type='text' class='w-75 border-0 bg-dark text-white' value='<?php echo $_SESSION['mainBalance']; ?>' readonly>
        </div>
    </div>
</div>

<div class="row">
<table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>Type</th>
                <th>From</th>
                <th>Destination</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr> -->
                <?php
                    $tblquery = "SELECT * FROM tbltransaction WHERE accNo = '$_SESSION[accNo]' || destAcc = '$_SESSION[accNo]'";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                        
                            if($accNo  == $_SESSION['accNo']){
                                $_SESSION['sentTo'] = $destAcc;
                                echo "
                                    <tr>
                                       <td>Transfer</td> 
                                       <td>$_SESSION[accName]</td> 
                                       <td>$_SESSION[sentToName]</td> 
                                       <td>$amount</td> 
                                       <td>$date</td> 
                                    </tr>
                                ";
                            }else if($accNo == 'Internal'){
                                echo "
                                    <tr>
                                       <td>Deposit</td> 
                                       <td>Internal</td> 
                                       <td>$_SESSION[accName]</td> 
                                       <td>$amount</td> 
                                       <td>$date</td> 
                                    </tr>
                                ";
                            }else if($destAcc == $_SESSION['accNo']){
                                $_SESSION['sentFrom'] = $accNo;
                                echo "
                                    <tr>
                                       <td>Credited</td> 
                                       <td>$_SESSION[sentFromName]</td> 
                                       <td>$_SESSION[accName]</td> 
                                       <td>$amount</td> 
                                       <td>$date</td> 
                                    </tr>
                                ";
                            }
                    }
                ?>
            <!-- </tr> -->
        </tbody>
    </table>
</div>

