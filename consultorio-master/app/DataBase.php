<?php
namespace App;
use PDO;
use PDOException;
class DataBase{
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '123';
    const DBNAME = 'consultorio';
    private $connection;
    private $table;
    
    public function __construct($table = null){
        $this->setConnection();
        $this->table = $table;
    }
    private function setConnection(){
        $this->connection = new PDO
        ('mysql:host='.self::HOST.';dbname='.self::DBNAME,self::USER,self::PASSWORD);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function execute($query, $values = null){
        try{
            $statement = $this->connection->prepare($query);
            $statement->execute($values);
            return $statement;
        }catch(PDOException $e){
            die('ERROR: '.$e->getMessage());
        }
    }
    public function insert($array){
        $fields = array_keys($array);
        $binds = array_pad([],count($array),'?');
        $query = 'insert into '.$this->table.'('.implode(', ',$fields).')
         values('.implode(', ',$binds).')';
        $this->execute($query, array_values($array));
        return $this->connection->lastInsertId();
        
    }
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = $where ? ' where '.$where : '';
        $order = $order ? ' order by '.$order : '';
        $limit = $limit ? ' limit '.$limit : '';
        $query = 'select '.$fields.' from '.$this->table . $where . $order .$limit;
        return $this->execute($query);
    }
    public function update($where, $array){
        $fields = array_keys($array);
        $query = 'update '.$this->table.' set '.implode('= ?, ',$fields).'=? where '.$where;
        return $this->execute($query,array_values($array));
    }
    public function delete($where){
        $query = 'delete from '.$this->table.' where '.$where;
        return $this->execute($query);
    }
    

}