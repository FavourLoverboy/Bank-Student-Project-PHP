<div class="row justify-content-center">
    <div class="col-md-8 rounded lead m-2 p-2 border border-1 text-center text-muted">Customers Table</div>
</div>
<div class="row">
    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr>
                <th>accName</th>
                <th>accNo</th>
                <th>accType</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr> -->
                <?php
                    $tblquery = "SELECT * FROM tblcustomer WHERE level = 'Customer' ORDER BY accName";
                    $tblvalue = array();
                    $select = $collect->tbl_select($tblquery, $tblvalue);
                    foreach($select as $data){
                        extract($data);
                        ?>
                        <?php
                            echo "
                                <tr>
                                    <td>$accName</td>
                                    <td>$accNo</td>
                                    <td>$accType</td>
                                    <td>
                                        <form action='updateCustomer' method='POST'>
                                            <input type='hidden' name='updateId' value='$customerId'>
                                            <input type='submit' name='update' class='btn btn-outline-warning btn-sm' value='Update'>
                                        </form>
                                    </td>
                                </tr>
                            ";
                    }
                ?>
            <!-- </tr> -->
        </tbody>
    </table>
</div>

<?php
    if($_POST['update']){

        extract($_POST);
        $_SESSION['customerId'] = $updateId;

        echo '<script> window.location="http://localhost/godson/customerUpdate"; </script>';
    }
?>