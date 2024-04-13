<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// // 你的数据库连接信息
// $hostname = "srv02958.soton.ac.uk"; // MySQL 服务器主机名
// $username = "MANG6531_student"; // MySQL 用户名
// $password = "tintin6531"; // MySQL 密码
// $database = "mgmt_webapp_msc"; // 要连接的数据库名称

$servername = "localhost";
$username = "root";
$password = "123456";
$database = "test"; // 修改为你要连接的数据库名

// 检查是否收到了POST请求，并且包含名为"package"的数据
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["package"]) && isset($_POST["num1"]) && isset($_POST["num2"])) {
    // 创建连接
    $conn = new mysqli($servername, $username, $password, $database);

    // 检测连接
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 使用POST请求中的"package"值构建查询
    $package = $_POST["package"];
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $sql = "SELECT cost FROM holiday WHERE package = '$package'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 对查询结果进行处理并进行数学运算
        while ($row = $result->fetch_assoc()) {
            $cost = $row["cost"];
            // 进行数学运算
            $sum = $cost * $num1 + $cost * $num2 * 0.75;
            $sum2 = $sum * 1.2;
            echo "$sum" . "$" . " " . "AT: " . $sum2 . "$" . "<br>";
        }
    } else {
        echo "0 结果";
    }
    $conn->close();
}
?>