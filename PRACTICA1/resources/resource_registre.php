<?php require __DIR__ . '/../view/header.php'; ?>

<div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
    
    <div style="width: 100%; max-width: 450px; padding: 20px;">
        
        <h2 style="font-family: 'Cinzel', serif; text-align: center; margin-bottom: 30px; font-size: 2rem;">
            BECOME A MEMBER
        </h2>

        <?php if (isset($_SESSION['error_register'])): ?>
            <div style="background: #ffe6e6; color: red; padding: 10px; text-align: center; margin-bottom: 20px; font-size: 0.9rem;">
                <?php echo $_SESSION['error_register']; unset($_SESSION['error_register']); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo BASE_URL . 'index.php?action=registre_submit'; ?>" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
            
            <div>
                <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">Full Name *</label>
                <input type="text" name="nom" required placeholder="Enter your name">
            </div>

            <div>
                <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">Email *</label>
                <input type="email" name="email" required placeholder="email@address.com">
            </div>

            <div>
                <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">Password *</label>
                <input type="password" name="password" required placeholder="Create a password">
            </div>

            <div style="height: 1px; background: #eee; margin: 10px 0;"></div>

            <div>
                <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">Address</label>
                <input type="text" name="adreca" required placeholder="Street and number">
            </div>

            <div style="display: flex; gap: 10px;">
                <div style="flex: 1;">
                    <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">City</label>
                    <input type="text" name="poblacio" required placeholder="City">
                </div>
                <div style="flex: 1;">
                    <label style="font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; font-weight: bold;">Postal Code</label>
                    <input type="text" name="codi_postal" required placeholder="00000" pattern="\d{5}">
                </div>
            </div>

            <button type="submit" style="margin-top: 20px; background: black; color: white; padding: 15px; border: none; font-family: 'Montserrat'; text-transform: uppercase; letter-spacing: 2px; font-weight: bold; cursor: pointer;">
                CREATE ACCOUNT
            </button>

        </form>

        <p style="text-align: center; margin-top: 20px; font-size: 0.8rem; color: #666;">
            Already have an account? <a href="index.php?action=login" style="text-decoration: underline; color: black;">Login</a>
        </p>
    </div>

</div>

<footer style="text-align: center; padding: 40px; background-color: #111; color: white; margin-top: 50px;">
    <h2 style="font-family: 'Cinzel'; margin-bottom: 10px;">SINGH</h2>
    <p style="font-size: 0.7rem; color: #666;">EST. 2025 | BARCELONA</p>
</footer>

</body>
</html>
