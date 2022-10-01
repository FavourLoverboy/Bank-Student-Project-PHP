<?php 
    $tblquery = "SELECT * FROM tblcustomer WHERE customerId = '$_SESSION[customerId]'";
    $tblvalue = array();
    $select = $collect->tbl_select($tblquery, $tblvalue);
    if($select){
        foreach($select as $data){
            extract($data);
            ?>
            <?php
            $_SESSION['accNo'] = $accNo;
            $_SESSION['accName'] = $accName;
        }
    }
?>
<?php 
    $tblquery = "SELECT sum(amount) as balance FROM tbltransaction WHERE destAcc = '$_SESSION[accNo]'";
    $tblvalue = array();
    $select = $collect->tbl_select($tblquery, $tblvalue);
    if($select){
        foreach($select as $data){
            extract($data);
            ?>
            <?php
            $_SESSION['tblTransactionBalance'] = $balance;
            // echo $balance;
        }
    }
?>
<?php 
    $tblquery = "SELECT sum(amount) as balance FROM tbltransaction WHERE accNo = '$_SESSION[accNo]'";
    $tblvalue = array();
    $select = $collect->tbl_select($tblquery, $tblvalue);
    if($select){
        foreach($select as $data){
            extract($data);
            ?>
             <?php
            $_SESSION['tblTransactionSent'] = $balance;
            // echo $balance;
        }
    }

    $_SESSION['mainBalance'] = $_SESSION['tblTransactionBalance'] -  $_SESSION['tblTransactionSent'];
?>

<div class="row justify-content-center">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-muted">Welcome to the Dashboard</div>
</div>

<div class="row justify-content-center gap-1">
    <?php
        $tblquery = "SELECT count(accName) as allCustomer FROM tblcustomer WHERE level = 'Customer'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                if($_SESSION['level'] == 'Admin'){
                    echo "
                        <div class='col-3 bg-warning rounded' style='height:150px'>
                            <div class='row'>
                                <div class='col-12 rounded' style='height:70px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p class='lead'>Customers</p>
                                </div>
                                <div class='col-12 rounded' style='height:20px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p>$allCustomer</p>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }


        $tblquery = "SELECT count(accNo) as allDeposit FROM tbltransaction WHERE accNo = 'Internal'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                if($_SESSION['level'] == 'Admin'){
                    echo "
                        <div class='col-5 bg-warning rounded' style='height:150px'>
                            <div class='row'>
                                <div class='col-12 rounded' style='height:70px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p class='lead'>Deposits</p>
                                </div>
                                <div class='col-12 rounded' style='height:20px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p>$allDeposit</p>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }


        $tblquery = "SELECT count(accNo) as allDeposit FROM tbltransaction WHERE accNo != 'Internal'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                if($_SESSION['level'] == 'Admin'){
                    echo "
                        <div class='col-3 bg-warning rounded' style='height:150px'>
                            <div class='row'>
                                <div class='col-12 rounded' style='height:70px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p class='lead'>Transactions</p>
                                </div>
                                <div class='col-12 rounded' style='height:20px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p>$allDeposit</p>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }
    ?>
</div>


<div class="row justify-content-center gap-1">
    <?php
        $tblquery = "SELECT count(accNo) as allDeposit FROM tbltransaction WHERE accNo = 'Internal' AND destAcc = '$_SESSION[accNo]'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                if($_SESSION['level'] == 'Customer'){
                    echo "
                        <div class='col-3 bg-warning rounded' style='height:150px'>
                            <div class='row'>
                                <div class='col-12 rounded' style='height:70px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p class='lead'>Deposits</p>
                                </div>
                                <div class='col-12 rounded' style='height:20px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p>$allDeposit</p>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }


        $tblquery = "SELECT count(accNo) as allTransfer FROM tbltransaction WHERE accNo = '$_SESSION[accNo]'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                if($_SESSION['level'] == 'Customer'){
                    echo "
                        <div class='col-5 bg-warning rounded' style='height:150px'>
                            <div class='row'>
                                <div class='col-12 rounded' style='height:70px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p class='lead'>Transfer</p>
                                </div>
                                <div class='col-12 rounded' style='height:20px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p>$allTransfer</p>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }


        $tblquery = "SELECT count(accNo) as allReceive FROM tbltransaction WHERE destAcc = '$_SESSION[accNo]'";
        $tblvalue = array();
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                ?>
                <?php
                if($_SESSION['level'] == 'Customer'){
                    echo "
                        <div class='col-3 bg-warning rounded' style='height:150px'>
                            <div class='row'>
                                <div class='col-12 rounded' style='height:70px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p class='lead'>Receive</p>
                                </div>
                                <div class='col-12 rounded' style='height:20px'></div>
                                <div class='col-12 rounded text-center' style='height:30px'>
                                    <p>$allReceive</p>
                                </div>
                            </div>
                        </div>
                    ";
                }
            }
        }
    ?>
</div>