<?php
error_reporting(E_ALL);
ini_set("display_errors", 'On');
class saving
{
    public $link;
    public function __construct()
    {
        $this->connectDb();
    }

    public function connectDb()
    {
        $this->link = new PDO("pgsql:host=localhost;dbname=test","postgres",'123') or die('链接数据库失败');
    }


    /**
     * @param $account 账户名
     */
    function get($account)
    {




        $sql = "select balance from saving where account = '$account'";
        $res =  $this->link->query($sql);
        $row = $res->fetch();
        if(!$row) {
            return die($account . '账户不存在');
        }else{
            $balance = $row['balance'];
            return $balance;
        }
    }


    public function update($account, $money)
    {

        $sql = "update saving set balance = balance + $money where account = '$account'";
        $res =  $this->link->exec($sql);
        if($res){
            return true;
        }else{
            return false;
        }






    }




    function transferAccounts($account1, $account2, $money)


    {



        //核对账户是否存在
        $check_account1 = $this->check_account($account1);
        $check_account2 = $this->check_account($account2);

        //核对账户1余额是否不足
        $check_balance1 = $this->check_balance($account1, $money);

        $res1 = $this->update($account1, -$money);
        $res2= $this->update($account2, $money);

        if($res1 && $res2)
        {
            echo '转账成功';
        }else {
            echo '转账失败';
        }


    }


    /**
     * @param $account 账户名
     * @return bool 是否存在该账户
     */
    function check_account($account)
    {
        $sql = "select * from saving where account = '$account'";
        $res =  $this->link->query($sql);
        $row = $res->fetch();
        if(!$row) {
            return die($account . '账户不存在');
        }else{
            return true;
        }
    }


    function check_balance($account,$money)
    {
        $sql = "select balance from saving where account = '$account'";
        $res =  $this->link->query($sql);
        $row = $res->fetch();
        $balance = $row['balance'];

        if(($balance - $money) < 0)
        {
            return die($account . '余额不足');
        }else {
            return true;
        }


    }





}
$account1 = $_GET['account1'];
$account2 = $_GET['account2'];
$money = $_GET['money'];
$obj = new saving();
$obj->transferAccounts($account1, $account2 , $money);



?>