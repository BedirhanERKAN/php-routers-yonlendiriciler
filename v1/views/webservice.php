<?php
/*
 * Created by Bedirhan ERKAN
 * Github   :  BedirhanERKAN
 * Facebook :  BedirhanERKAN
 * Twitter  :  BedirhanERKAN
 * Youtube  :  BedirhanERKAN
 */

    class user
    {

        function __construct()
        {
            echo "accounts() class called.<br>";
        }

        public function new()
        {
            echo "New user add<br>";        
        }

        public function update()
        {
            echo "User data update<br>";        
        }

        public function delete($id)
        {
            echo $id." user id delete<br>";        
        }


    }


    $class = new $_GET["webservice-class"]();
    $function_name = $_GET["webservice-function"];
    $class->$function_name($_GET["webservice-arg"]);
?>