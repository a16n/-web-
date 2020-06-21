<?php
session_start();
//error_reporting(0);
require_once './sql/dbconnect.php';
$username = trim($_POST['username']);
$password = trim($_POST['password']);
if (($username == '') || ($password == '')) {
    // 若为空,视为未填写,提示错误,并3秒后返回登录界面
    header('refresh:1; url=login.html');
    echo "用户名或密码不能为空,系统将在1秒后跳转到登录界面,请重新填写登录信息!";
    exit;
}
if (isset($username)) {
    $sqlu = "select username,password from user where username='$username';";
    $result = mysqli_query($connect, $sqlu);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($connect));
        exit();
    } else {
        $row = mysqli_fetch_array($result);
    }
    if ($password == $row['password']) {
        header('refresh:1; url=index.html');
        echo "登录成功";
    } else {
        header('refresh:1; url=login.html');
        echo "输入的密码不正确,系统将在1秒后跳转到登录界面,请重新填写登录信息!";
        exit;
    }
}
