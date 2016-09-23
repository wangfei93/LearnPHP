<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
include 'config.php';
class Pgsql extends PDO
{
    public  $dsn;
    public  $user;
    public  $password;
 
    private static $__PDO=null;
    private static $__queries=0;
    function __construct($dsn,$user,$password){

        try {
            self::$__PDO = new PDO($dsn, $user, $password);
        } catch(PDOException $e) {
            print_r($e);
        }
        parent::__construct($dsn, $user, $password);
    }
    private static function execute($sql,$params)
    {
        try {
            $stmt = self::$__PDO->prepare($sql);
            if ($params !== null) {
                if (is_array($params) || is_object($params)) {
                    $i = 1;
                    foreach ($params as $param) {
                        $stmt->bindValue($i++, $param);
                    }
                } else {
                    $stmt->bindValue(1, $params);
                }
            }
            if ($stmt->execute()) {
                self::$__queries++;
                return $stmt;
            } else {
                $err = $stmt->errorInfo();
                throw new PDOException($err[2], $err[1]);
            }
        } catch (PDOException $e) {
            print_r($e);
        }
    }

    public static function getRow($sql,$params=null)
    {
        $stmt=self::execute($sql,$params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public static function getAll($sql,$params=null)
    {
        $stmt=self::execute($sql,$params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function search(){


        

    }

}



;