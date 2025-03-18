<?php
// Date/heure d'activation (format : YYYY-MM-DD HH:MM:SS)
$activation_time = strtotime("2025-03-21 18:00:00");
$current_time = time();

if ($current_time >= $activation_time) {
    header("Location: https://offuscation.eu/indexBis.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CTF Locked</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100%;
      background: black;
      overflow: hidden;
      font-family: monospace;
      color: #00ff00;
    }
    canvas {
      position: absolute;
      top: 0;
      left: 0;
      z-index: 0;
    }
    .message {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      z-index: 1;
      color: #00ff00;
      text-shadow: 0 0 10px #00ff00, 0 0 20px #00ff00;
    }
    .message h1 {
      font-size: 3em;
      margin: 0;
    }
    .message p {
      font-size: 1.5em;
    }
  </style>
</head>
<body>
  <canvas id="matrix"></canvas>
  <div class="message">
    <!-- maxLaMenace.png -->
    <h1>CTF VERROUILLÉ</h1>
    <p>Le portail ne s'ouvrira qu'à <strong>18h00 le 21/03/2025</strong>... Patience, mon jeune Padawan .</p>
  </div>
    <!-- Il n'y a rien à voir dans le code là ! On circule !   -->
    <!-- Maxime, va plutôt travailler sur le projet IA stp, je te dirai quand ça commence.  -->
  <script>
    const canvas = document.getElementById("matrix");
    const ctx = canvas.getContext("2d");
    /* https://civitai.com/images/781191 */
    canvas.height = window.innerHeight;
    canvas.width = window.innerWidth;
    /* Ces caractère chinois ne veulent rien dire, c'est de l'aléatoire made in ChatGPT */
    const chinese = "王楚然刘诗诗杨幂张嘉倪宋轶吴谨言黄灿灿赵露思唐嫣".split("");
    const font_size = 16;
    const columns = canvas.width / font_size;
    const drops = [];

    for (let x = 0; x < columns; x++) drops[x] = 1;

    function draw() {
      ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
      ctx.fillRect(0, 0, canvas.width, canvas.height);

      ctx.fillStyle = "#0F0";
      ctx.font = font_size + "px monospace";

      for (let i = 0; i < drops.length; i++) {
        const text = chinese[Math.floor(Math.random() * chinese.length)];
        ctx.fillText(text, i * font_size, drops[i] * font_size);

        if (drops[i] * font_size > canvas.height && Math.random() > 0.975)
          drops[i] = 0;
        /*    */
        drops[i]++;
      }
    }
    /* https://www.youtube.com/watch?v=dOF9vc5tLJ4 */
    setInterval(draw, 33);
  </script>
</body>
</html>
