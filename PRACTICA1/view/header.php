<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<header style="background-color: #f8f9fa; padding: 10px; border-bottom: 1px solid #ddd; margin-bottom: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        
        <div class="logo">
            <a href="index.php?action=categories" style="text-decoration: none; font-size: 20px; font-weight: bold;">Mi Tienda de Ropa</a>
        </div>

        <div class="user-menu">
            <?php if (isset($_SESSION['user_id'])): ?> <div style="position: relative; display: inline-block;">
                    <button id="menu-toggle" style="cursor: pointer; padding: 5px 10px;">
                        Hola, <?php echo htmlspecialchars($_SESSION['user_name'] ?? 'Usuario'); ?> ▼
                    </button>
                    
                    <div id="user-dropdown" style="display: none; position: absolute; right: 0; background-color: white; min-width: 150px; box-shadow: 0px 8px 16px rgba(0,0,0,0.2); z-index: 1;">
                        <a href="index.php?action=compte" style="display: block; padding: 10px; text-decoration: none; color: black;">El meu compte</a>
                        <a href="index.php?action=comandes" style="display: block; padding: 10px; text-decoration: none; color: black;">Les meves compres</a>
                        <hr style="margin: 0;">
                        <a href="index.php?action=logout" style="display: block; padding: 10px; text-decoration: none; color: red;">Tancar sessió</a>
                    </div>
                </div>

            <?php else: ?>
                <a href="index.php?action=login" style="margin-right: 10px;">Login</a>
                <a href="index.php?action=registre">Registre</a>
            <?php endif; ?>
        </div>
    </div>
</header>

<script>
    // Lógica jQuery para el efecto desplegable
    $(document).ready(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault(); // Evita saltos extraños
            $("#user-dropdown").slideToggle("fast"); // Efecto de deslizar
        });
    });
</script>