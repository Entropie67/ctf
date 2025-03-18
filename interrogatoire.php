<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = strtolower(trim($_POST["password"]));

    // Hash SHA-256 correct du mot "LiuShishi2025"
    $expectedHash = hash("sha256", strtolower("LiuShishi2025"));

    if (hash("sha256", $password) === $expectedHash) {
        echo json_encode(["status" => "success", "redirect" => "finale.html"]);
    } else {
        echo json_encode(["status" => "error", "redirect" => "lapin.html"]);
    }
}
?>
