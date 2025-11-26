<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SINGH | Luxury Apparel</title>
    <link rel="stylesheet" href="<?php echo BASE_URL . 'css/example.css'; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<header class="singh-header-compact">
    
    <div class="header-left">
        <a href="#" id="btn-about">ABOUT SINGH</a>
        <a href="index.php?action=categories">COLLECTION</a>
    </div>

    <div class="header-center">
        <a href="index.php" class="brand-logo-compact">SINGH</a>
    </div>

    <div class="header-right">
        <?php if (isset($_SESSION['user_id'])): ?>
            <div class="user-menu">
                <button class="user-trigger" aria-haspopup="true" aria-expanded="false">
                    <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Account'); ?>
                </button>
                <div class="user-dropdown" role="menu" style="display: none;">
                    <a href="index.php?action=account" role="menuitem">El meu compte</a>
                    <a href="index.php?action=orders" role="menuitem">Les meves compres</a>
                    <a href="index.php?action=logout" role="menuitem">Tancar sessió</a>
                </div>
            </div>
        <?php else: ?>
            <a href="index.php?action=login">Iniciar sessió</a>
            <a href="index.php?action=registre">Register</a>
        <?php endif; ?>
        <a href="#">Bag (0)</a>
    </div>
</header>

<div id="about-modal" class="modal-overlay" style="display:none;">
    <div class="modal-content">
        <span id="close-modal" class="close-btn">&times;</span>
        <h2 class="modal-title">THE HOUSE OF SINGH</h2>
        <div class="modal-body">
            <p>Fundada en 2025, SINGH nace de la fusión entre la elegancia clásica y la modernidad audaz.</p>
            <p>Inspirada en mis raíces y en la arquitectura global, nuestra misión es redefinir el lujo accesible, creando siluetas que empoderan a quien las lleva.</p>
            <p>Cada pieza es un testimonio de artesanía, diseñada no solo para vestir, sino para expresar una identidad única.</p>
            <br>
            <p style="font-family:'Cinzel'; font-weight:bold;">— Gurinder Singh, Director Creativo.</p>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Abrir Modal
    $("#btn-about").click(function(e) {
        e.preventDefault();
        $("#about-modal").fadeIn(300);
        $("body").css("overflow", "hidden"); // Evitar scroll detrás
    });

    // Cerrar Modal (Botón X)
    $("#close-modal").click(function() {
        $("#about-modal").fadeOut(300);
        $("body").css("overflow", "auto");
    });

    // Cerrar Modal (Clic fuera)
    $("#about-modal").click(function(e) {
        if (e.target === this) {
            $(this).fadeOut(300);
            $("body").css("overflow", "auto");
        }
    });

    // Menú d'usuari desplegable amb hover (jQuery)
    const closeMenus = () => {
        $(".user-menu").removeClass("is-open");
        $(".user-trigger").attr("aria-expanded", "false");
        $(".user-dropdown").stop(true, true).slideUp(150);
    };

    $(".user-menu").on("mouseenter", function() {
        const menu = $(this);
        closeMenus();
        menu.addClass("is-open");
        menu.find(".user-trigger").attr("aria-expanded", "true");
        menu.find(".user-dropdown").stop(true, true).slideDown(150);
    }).on("mouseleave", function() {
        $(this).find(".user-dropdown").stop(true, true).slideUp(150, closeMenus);
    });
});
</script>
