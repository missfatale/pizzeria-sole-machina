<div>
    <label for="login-username">Gebruikersnaam:</label>
    <input type="text" id="login-username" name="login-username" minlength="3" maxlength="15" required>
</div>

<div>
    <label for="login-password">Wachtwoord:</label>
    <input type="password" id="login-password" name="login-password" minlength="8" maxlength="15" required>
</div>

<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? '') ?>">

<button type="submit" class="btn-secondary">Inloggen</button>