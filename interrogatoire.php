<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = strtolower(trim($_POST["password"]));

    // Hash SHA-256 correct du mot "pastèque"
    $expectedHash = hash("sha256", "LiuShishi2025");

    if (hash("sha256", $password) === $expectedHash) {
        echo json_encode(["status" => "success", "redirect" => "6fi4n.html"]);
    } else {
        echo json_encode(["status" => "error", "redirect" => "lapin.html"]);
    }
}
?>
