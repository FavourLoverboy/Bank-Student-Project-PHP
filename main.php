<?php
    session_start();
    if($_SESSION['username']){
        
    }else{
        header('location: login.php');
    }

    if($url[0] == 'dashboard'){
        $dashboard = 'active';
        echo "<title>Dashboard | Access Bank</title>";
    }
    else if($url[0] == 'createCustomer'){
        $createCustomer = 'active';
        echo "<title>Create Customer | Access Bank</title>";
    }
    else if($url[0] == 'listOfCustomer'){
        $listOfCustomer = 'active';
        echo "<title>List Of Customer | Access Bank</title>";
    }
    else if($url[0] == 'fundCustomer'){
        $fundCustomer = 'active';
        echo "<title>Fund Customer | Access Bank</title>";
    }
    else if($url[0] == 'deleteCustomer'){
        $deleteCustomer = 'active';
        echo "<title>Delete Customer | Access Bank</title>";
    }
    else if($url[0] == 'updateCustomer'){
        $updateCustomer = 'active';
        echo "<title>Update Customer | Access Bank</title>";
    }
    else if($url[0] == 'viewCustomer'){
        echo "<title>View Customer | Access Bank</title>";
    }


    else if($url[0] == 'profile'){
        $profile = 'active';
        echo "<title>Profile | Access Bank</title>";
    }
    else if($url[0] == 'transaction'){
        $transaction = 'active';
        echo "<title>Transaction | Access Bank</title>";
    }
    else if($url[0] == 'deposit'){
        $deposit = 'active';
        echo "<title>Deposit | Access Bank</title>";
    }
    else if($url[0] == 'customerUpdate'){
        $updateCustomer = 'active';
        echo "<title>Update Customer | Access Bank</title>";
    }
    else if($url[0] == 'send'){
        echo "<title>Send Money | Access Bank</title>";
    }

    

?>

<?php include('includes/header.php'); ?>

    <!-- ============ Main Parent Body Container -->
    <div class="container-fluid">
        <div class="leftSide">
            
            <div class="row justify-content-center">
                <div class="col-12 topNavLeft">
                    <div class="row justify-content-center">
                        <div class="col-2 left">
                            <img src="./assets/proPic.png" alt="Profile Picture">
                        </div>
                        <div class="col-10 right">
                            <p class="username"><?php echo $_SESSION['username']?></p>
                        </div>
                    </div>
                </div>
                <div class="col-10 bg-warning my-2 p-2 text-white">
                    Access Bank
                </div>
                <div class="col-11  mt-4">
                    <?php include('pages/menu.php'); ?>
                </div>
            </div>
        </div>
        <div class="rightSide">
            <div class="row">
                <div class="col-12 topNavMobile">
                   
                </div>
                <div class="col-12 topNav">
                    <div class="row justify-content-center">
                        <div class="col-9 bg-info left text-center">
                            <h3 class="text-light"  style="line-height:45px;">Access Bank</h3>
                        </div>
                        <div class="col-3 bg-danger right">
                            <div class="row">
                                <div class="col-2 left">
                                    <div class="row justify-content-center m-0">
                                        <div class="col-11 m-0 p-0 justify-content-center bg-info" style="border-radius:50%;">
                                            <?php
                                                $tblquery = "SELECT * FROM tblcustomer WHERE customerId = '$_SESSION[customerId]'";
                                                $tblvalue = array();
                                                $select = $collect->tbl_select($tblquery, $tblvalue);
                                                foreach($select as $data){
                                                    extract($data);
                                                    ?>
                                                    <?php
                                                    echo "
                                                        <img src='upload/$passport' style='border-radius:50%;' alt='Profile Picture'>
                                                    ";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                    <!-- <img src="./assets/proPic.png" alt="Profile Picture"> -->
                                </div>
                                <div class="col-10 right">
                                    <p class="username"><?php echo $_SESSION['username']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-11 my-3 mainBody">
                            <?php include($pages);?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="toggle" onclick="toggleMenu()" style="z-index:999999999999;">
                <span><i class="bi bi-list"></i></span>
            </div>
        </div>        
    </div>
<?php include('includes/footer.php'); ?>