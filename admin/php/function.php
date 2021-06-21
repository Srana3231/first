<?php
    function pr($arr)
    {
        echo "<pre>";
        print_r($arr);
    }
    function prx($arr)
    {
        echo "<pre>";
        print_r($arr);
        die();
    }
    function get_safe_value($conn,$str)
    {
        if (empty($str)) {
            echo "Variable 'a' is empty.<br>";
        }
        else {
            return mysqli_real_escape_string($conn,$str);
        }
    }


?>