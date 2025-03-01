<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = strtolower(trim($_POST["password"]));

    // Hash SHA-256 correct du mot "pastèque"
    $expectedHash = hash("sha256", "pastèque");

    if (hash("sha256", $password) === $expectedHash) {
        echo json_encode(["status" => "success", "redirect" => "image.html"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Mot de passe incorrect."]);
    }
}
?>
