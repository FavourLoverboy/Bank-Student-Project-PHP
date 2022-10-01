<?php
    if($_POST['delete']){

        extract($_POST);


        $tblquery = "DELETE FROM tblcustomer WHERE customerId = :id";
        $tblvalue = array(
            ':id' => htmlspecialchars($deletedId)
        );
        $delete = $collect->tbl_delete($tblquery, $tblvalue);
        if($delete){
            echo "
                <div class='alert alert-success border border-1 alert-dismissible fade show rounded text-muted text-center' role='alert'>
                    <strong>Customer</strong> has been deleted.
                </div>
            ";
        }
    }
?>

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
                <th>Delete</th>
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
                                        <form action='deleteCustomer' method='POST'>
                                            <input type='hidden' name='deletedId' value='$customerId'>
                                            <input type='submit' name='delete' class='btn btn-outline-danger btn-sm' value='Delete'>
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

