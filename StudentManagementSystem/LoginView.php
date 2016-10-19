
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <title>登陆页面</title>
</head>
<body>

<form action="LoginManage.php" method="post">
    <table>
        <tr>
            <td>账号:&nbsp<td/>
            <td><input type="number" name="t_id"></td>
        </tr>
        <tr>
            <td>密码:&nbsp<td/>
            <td><input type="password" name="t_password"/></td>
        </tr>
        <tr>
            <td><input type="submit" value="登陆"/> <td/>
            <td><input type="reset" value="清空"/></td>
        </tr>
    </table>
</form>


<?php

if(!empty($_GET['error'])){
    if($_GET['error']==1){
        echo "<font color=\"red\">账号或者密码出错<font/>";
    }
   else if($_GET['error']==2){
       echo "<font color=\"red\">账号或者密码不能为空<font/>";
   }
}


?>

</body>
</html>

