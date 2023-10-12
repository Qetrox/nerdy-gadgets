<?php




if (!function_exists('check_login')) {

    function check_login($con)
    {

        if (isset($_SESSION['email'])) {
            $id = $_SESSION['user_id'];
            $query = "select * from users where user_id = '$id' limit 1";
            $result = mysqli_query($con, $query);


            if ($result and mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        // terug naar index.php
        header("Location: ../account/index.php");
        die;
    }
}
?>