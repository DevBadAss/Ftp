<?php

define("API_KEY", "dev");

if (isset($_GET["action"]) && isset($_GET["dirname"])) {
    $ACTION = $_GET["action"];
    $DIRNAME = $_GET["dirname"];
} else if (!isset($_GET["action"]) && !isset($_GET["dirname"])) {
    echo json_encode(array("response" => "No parameters found", "status" => 404));
}

if (isset($_GET["api-key"])) {
    $key = $_GET["api-key"];
    if ($key !== API_KEY) {
        echo json_encode(array("response" => "api-key does not match!", "status" => 404));
    } else if ($key === API_KEY) {
        if (isset($ACTION)) {
            if ($ACTION === "create") {
                if (mkdir($DIRNAME)) {
                    echo json_encode(array("response" => "SUCCESS", "status" => 200));
                } else {
                    echo json_encode(array("response" => "ERROR", "status" => 404));
                }
            }

            if ($ACTION === "delete") {
                if (rmdir($DIRNAME)) {
                    echo json_encode(array("response" => "SUCCESS", "status" => 200));
                } else {
                    echo json_encode(array("response" => "ERROR", "status" => 404));
                }
            }
        }
    }
}else{
    echo json_encode(array("response" => "No api-key found", "status" => 404));
}



?>