<?php require __DIR__ . '/../view/header.php'; ?>

<div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
    <div style="width: 100%; max-width: 420px; padding: 20px;">
        <h2 style="font-family: 'Cinzel', serif; text-align: center; margin-bottom: 30px; font-size: 2rem;">
            SIGN IN
        </h2>

        <?php if (isset($_SESSION['error_login'])): ?>
            <div style="background: #ffe6e6; color: red; padding: 10px; text-align: center; margin-bottom: 20px; font-size: 0.9rem;">
                <?php echo $_SESSION['error_login']; unset($_SESSION['error_login']); ?>
            </div>
        <?php endif; ?>

        <form action="index.php?action=do_login" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            <div>
                <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">Email *</label>
                <input type="email" name="email" required placeholder="email@address.com">
            </div>
            <div>
                <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">Password *</label>
                <input type="password" name="password" required placeholder="Your password">
            </div>
            <button type="submit" style="margin-top: 10px; background: black; color: white; padding: 15px; border: none; font-family: 'Montserrat'; text-transform: uppercase; letter-spacing: 2px; font-weight: bold; cursor: pointer;">
                Log in
            </button>
        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 0.8rem; color: #666;">
            Don't have an account? <a href="index.php?action=registre" style="text-decoration: underline; color: black;">Register</a>
        </p>
    </div>
</div>

<footer style="text-align: center; padding: 40px; background-color: #111; color: white; margin-top: 50px;">
    <h2 style="font-family: 'Cinzel'; margin-bottom: 10px;">SINGH</h2>
    <p style="font-size: 0.7rem; color: #666;">EST. 2025 | BARCELONA</p>
</footer>

</body>
</html>
