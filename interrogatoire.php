<?php
$apiKey = "TA_CLE_OPENAI"; // 🔥 Ta clé API OpenAI 🔥

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$question = trim($data["question"]);

// 🚀 Ajout du prompt de rôle
$preprompt = "Tu es l'agent Gamma, capturé et interrogé.
Tu refuses de donner des informations au début, puis tu commences à révéler des indices si l’interrogateur pose les bonnes questions.\n\n";

$fullPrompt = $preprompt . "Interrogateur : " . $question;

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . $apiKey
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "model" => "gpt-4",
    "messages" => [["role" => "user", "content" => $fullPrompt]],
    "max_tokens" => 150
]));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
