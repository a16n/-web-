<?php

$connect = mysqli_connect(
    $host = 'localhost',
    $username = 'root',
    $password = 'root123',
    $database = 'testdb',
    $port = '3306',
);

if (mysqli_connect_errno())
{
    echo "连接失败: " . mysqli_connect_error();
}
