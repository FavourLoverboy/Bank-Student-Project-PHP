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
                <th>View</th>
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
                                        <form action='listOfCustomer' method='POST'>
                                            <input type='hidden' name='viewId' value='$customerId'>
                                            <input type='hidden' name='viewNo' value='$accNo'>
                                            <input type='submit' name='view' class='btn btn-outline-primary btn-sm' value='View'>
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
    if($_POST['view']){

        extract($_POST);
        $_SESSION['customerId'] = $viewId;
        $_SESSION['accNo'] = $viewNo;

        echo '<script> window.location="http://localhost/godson/viewCustomer"; </script>';
    }
?>