<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?action=login");
    exit();
}
?>
<?php require __DIR__ . '/../view/header.php'; ?>

<div class="container" style="min-height: 60vh; padding: 40px 20px;">
    <h2 style="font-family: 'Cinzel', serif; font-size: 2rem; margin-bottom: 10px;">El meu compte</h2>
    <p style="color: #555; margin-bottom: 30px;">Hola, <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?>.</p>

    <div style="border: 1px solid #eee; padding: 20px; max-width: 600px; background: #fafafa;">
        <h3 style="font-size: 1rem; letter-spacing: 1px; text-transform: uppercase;">Perfil</h3>
        <p style="margin: 8px 0;">Nom: <?php echo htmlspecialchars($_SESSION['user_name'] ?? ''); ?></p>
        <p style="margin: 8px 0;">Email: <?php echo htmlspecialchars($_SESSION['user_email'] ?? ''); ?></p>
        <a href="index.php?action=orders" style="text-decoration: underline; color: #000; display: inline-block; margin-top: 10px;">Veure compres</a>
    </div>
</div>

<footer style="text-align: center; padding: 40px; background-color: #111; color: white; margin-top: 50px;">
    <h2 style="font-family: 'Cinzel'; margin-bottom: 10px;">SINGH</h2>
    <p style="font-size: 0.7rem; color: #666;">EST. 2025 | BARCELONA</p>
</footer>

</body>
</html>
