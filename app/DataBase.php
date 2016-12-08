<?php

namespace App;

use \PDO;


class DataBase {

    protected $db_host;
    protected $db_table;
    protected $db_user;
    protected $db_pass;
    protected $pdo;

    public function __Construct($db_host='localhost', $db_table, $db_user, $db_pass='')
    {
        $this->db_host = $db_host;
        $this->db_table = $db_table;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
    }

    protected function getPDO()
    {
        if($this->pdo == null)
        {
            $this->pdo = new PDO("mysql:host={$this->db_host};dbname={$this->db_table}",$this->db_user , $this->db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->pdo;
    }

    protected function execute($statement, $class , $once = false)
    {
        $this->getPDO();
      
        $pdoStatement = $this->pdo->query($statement);
        $pdoStatement->setFetchMode(PDO::FETCH_CLASS, $class);

        if($once === true)
        {
            $results = $pdoStatement->fetch();
        }
        else{
            $results = $pdoStatement->fetchAll();
        }
       
        return $results;
    }

    public function prepare($statement, $options , $class, $once = false)
    {

        if($options == null)
        {
           return  $this->execute($statement , $class , $once);
        }
         $this->getPDO();
    
         $pdoStatment = $this->pdo->prepare($statement);
         $pdoStatment->execute($options);
         $pdoStatment->setFetchMode(PDO::FETCH_CLASS , $class);

         if($once === true)
         {
          
            $result = $pdoStatment->fetch();

         }else{
            $result = $pdoStatment->fetchAll();
         }
        
         
         return $result;
    }



}