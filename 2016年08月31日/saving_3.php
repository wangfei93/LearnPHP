

<html>
<head>

</head>
<body>
<table>
    <form action="save_3.php" method="get">
        <tr>
            <td>账户一:</td>
            <td><input type="text" name="account1" class="account" value="<?php echo $account1?>"></td>
            <p class="message"></p>
        </tr>
        <tr>
            <td>账户二:</td>
            <td><input type="text" name="account2" class="account" value="<?php echo $account2?>"></td>
            <p  class="message"></p>
        </tr>
        <tr>
            <td>转账金额:</td>
            <td><input type="text" name="money" id="money"  value="<?php echo $money?>"></td>
            <p id="message_money"></p>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="转账"  onclick="message()"></td>
        </tr>
    </form>
</table>

<script>
    function message()
    {

    }
</script>

</body>
</html>
