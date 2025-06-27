<div>
    <label for="register-first-name">Voornaam:</label>
    <input type="text" id="register-first-name" name="register-first_name" pattern="[A-Za-z\s]+" maxlength="15" required>
</div>

<div>
    <label for="register-last-name">Achternaam:</label>
    <input type="text" id="register-last-name" name="register-last_name" pattern="[A-Za-z\s]+" maxlength="15" required>
</div>

<div>
    <label for="register-username">Gebruikersnaam:</label>
    <input type="text" id="register-username" name="register-username" minlength="3" required>
</div>

<div>
    <label for="register-password">Wachtwoord:</label>
    <input type="password" id="register-password" name="register-password" minlength="8" required>
</div>

<div>
    <label for="register-address">Adres:</label>
    <input type="text" id="register-address" name="register-address" minlength="5" required>
</div>

<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

<button type="submit" class="btn-secondary">Registreren</button>