<?php

require_once './tablesInterface.php';

class UsersTable implements TablesInterface{
    private $_tableName = 'users';

    public function run($conn):void{
        if($this->_does_table_exist($conn)){
            return;
        }
        $this->_create_users_table($conn);
    }

    private function _does_table_exist($conn):bool{
        //query to check if the table exists before we try to create it 
        $query = "SELECT 1 from $this->_tableName";

        try{
           //$result = $conn->query($query);
           return false; //doing this just for the example
        }catch(Exception $e){
            //the table does not exist
            return false;
        }

        return $result !== FALSE;
    }

    private function _create_users_table():void{
        $query = "CREATE table $this->_tableName(
            id int AUTO_INCREMENT PRIMARY KEY,
            first_name varchar(255) NOT NULL,
            last_name varchar(255) NOT NULL
        );";

        //$conn->query($query)
        echo $query . PHP_EOL;
    }

}