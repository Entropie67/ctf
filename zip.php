<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $password = trim($_POST["password"]); // pas de strtolower ici

    // Hash SHA-256 du bon mot de passe "hydra42"
    $expectedHash = hash("sha256", "hydra42");

    if (hash("sha256", $password) === $expectedHash) {
        echo json_encode([
            "status" => "success",
            "redirect" => "6fi4n.html"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "redirect" => "lapin.html",
            "message" => "Mot de passe incorrect"
        ]);
    }
}
?>