    <ul>        
        <a href="dashboard" class="<?php echo $dashboard; ?>">
            <li>
                <span><i class="bi bi-house-door-fill"></i></span>
                Dashboard
            </li>
        </a>

    <?php 
        if($_SESSION['level'] == 'Admin'){
            echo  "
                <a href='createCustomer' class='$createCustomer'>
                    <li>
                        <span><i class='bi bi-person-fill'></i></span>
                        Create Customer
                    </li>
                </a>
                <a href='listOfCustomer' class='$listOfCustomer'>
                    <li>
                        <span><i class='bi bi-people-fill'></i></span>
                        Customers
                    </li>
                </a>
                <a href='fundCustomer' class='$fundCustomer'>
                    <li>
                        <span><i class='bi bi-currency-dollar'></i></span>
                        Credit Customer
                    </li>
                </a>
                <a href='deleteCustomer' class='$deleteCustomer'>
                    <li>
                        <span><i class='bi bi-person-x-fill'></i></span>
                        Remove Customer
                    </li>
                </a>
                <a href='updateCustomer' class='$updateCustomer'>
                    <li>
                        <span><i class='bi bi-recycle'></i></span>
                        Update Customer
                    </li>
                </a>
            ";
        }
        else if($_SESSION['level'] == 'Customer'){
            echo "
                <a href='profile' class='$profile'>
                    <li>
                        <span><i class='bi bi-image-alt'></i></span>
                        Profile
                    </li>
                </a>
                <a href='transaction' class='$transaction'>
                    <li>
                        <span><i class='bi bi-globe2'></i></span>
                        Transactions
                    </li>
                </a>
                <a href='deposit' class='$deposit'>
                    <li>
                        <span><i class='bi bi-coin'></i></span>
                        Transfer
                    </li>
                </a>
                <a href='privacy' class='$updateCustomer'>
                    <li>
                        <span><i class='bi bi-recycle'></i></span>
                        Update Profile
                    </li>
                </a>
            ";
        }
    ?> 

    <a href="logout.php">
        <li>
            <span><i class="bi bi-power"></i></span>
            Logout
        </li>
    </a>   
</ul>