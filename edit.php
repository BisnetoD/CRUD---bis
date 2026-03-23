<?php
require __DIR__ . "/connect.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id) die("ID inválido.");

$pdo = Connect::getInstance();
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
$stmt->execute([":id" => $id]);
$user = $stmt->fetch();
if (!$user) die("Aluno não encontrado.");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar aluno</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap" rel="stylesheet">
</head>

<body id="vanta-bg">

    <h1>Editar aluno</h1>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $user["id"] ?>">

        <p>
            <label>Nome:</label><br>
            <input type="text" name="name" value="<?= htmlspecialchars($user["name"]) ?>" required>
        </p>

        <p>
            <label>E-mail:</label><br>
            <input type="email" name="email" value="<?= htmlspecialchars($user["email"]) ?>" required>
        </p>

        <p>
            <label>Curso:</label><br>
            <input type="text" name="document" value="<?= htmlspecialchars($user["document"]) ?>" required>
        </p>

        <button type="submit">Atualizar</button>
    </form>

    <p style="text-align:center; margin-top: 10px;"><a href="index.php">Voltar</a></p>

    <!-- VANTA -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
    <script>
      VANTA.NET({
        el: "#vanta-bg",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00,
        color: 0xffdd3f,
        backgroundColor: 0x0a0018,
        points: 13.00,
        maxDistance: 12.00,
        spacing: 16.00
      })
    </script>

    <!-- Cursor -->
    <div class="cursor"></div>
    <script src="cursor.js"></script>

</body>
</html>