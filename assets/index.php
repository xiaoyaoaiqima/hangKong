<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    header('Access-Control-Allow-Origin: http://127.0.0.1:5501/order.html'); // Allows CORS requests only from your HTML's origin
    header('Content-Type: application/json'); // Specifies the content type returned
    
    // Allow only POST method for security
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "Hello World!";
        // Get JSON as a string
        $json = file_get_contents('php://input');
        echo $json;
        // Decode the JSON data
        $data = json_decode($json, true);

        if ($data) {
            // Process data - Example response
            $response = [
                "status" => "success",
                "message" => "Data received successfully",
                "receivedData" => $data
            ];
        } else {
            $response = [
                "status" => "error",
                "message" => "Invalid or no JSON data"
            ];
        }

        // Send response back to JavaScript
        echo json_encode($response);
    } else {
        // Respond with an error if not a POST request
        echo json_encode(["status" => "error", "message" => "Request method not supported"]);
    }
    // 数据库连接信息
    $hostname = "srv02958.soton.ac.uk"; // MySQL 服务器主机名
    $username = "MANG6531_student"; // MySQL 用户名
    $password = "tintin6531"; // MySQL 密码
    $database = "mgmt_webapp_msc"; // 要连接的数据库名称
    ?>

</body>

</html>