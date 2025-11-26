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
    <h2 style="font-family: 'Cinzel', serif; font-size: 2rem; margin-bottom: 10px;">Les meves compres</h2>
    <p style="color: #555; margin-bottom: 20px;">Encara no hi ha comandes registrades.</p>
    <a href="index.php?action=categories" style="text-decoration: underline; color: #000;">Tornar a la col·lecció</a>
</div>

<footer style="text-align: center; padding: 40px; background-color: #111; color: white; margin-top: 50px;">
    <h2 style="font-family: 'Cinzel'; margin-bottom: 10px;">SINGH</h2>
    <p style="font-size: 0.7rem; color: #666;">EST. 2025 | BARCELONA</p>
</footer>

</body>
</html>
