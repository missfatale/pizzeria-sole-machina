<div>
    <label for="title">Aanspreekvorm:</label>
    <select id="title" name="title" required>
        <option value="" disabled selected>Selecteer je aanspreekvorm</option>
        <option value="Heer">Heer</option>
        <option value="Mevrouw">Mevrouw</option>
        <option value="Anders">Anders</option>
    </select>
</div>

<div>
    <label for="register-first-name">Voornaam:</label>
    <input type="text" id="register-first-name" name="register-first_name" pattern="[A-Za-z\s]+" maxlength="15" required>
</div>

<div>
    <label for="register-last-name">Achternaam:</label>
    <input type="text" id="register-last-name" name="register-last_name" pattern="[A-Za-z\s]+" maxlength="15" required>
</div>

<div>
    <label for="register-geboortedatum">Geboortedatum:</label>
    <input type="date" id="register-geboortedatum" name="register-geboortedatum" required>
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
    <label for="register-email">Email:</label>
    <input type="email" id="register-email" name="register-email" minlength="5" placeholder="gebruiker@provider.nl" required>
</div>

<div>
    <label for="register-mobile">Mobiele Nummer:</label>
    <input type="text" id="register-mobile" name="register-mobile" placeholder="06-00000000" pattern="06-\d{8}" title="Must be in the format 06-XXXXXXXX" required>
</div>

<div>
    <label for="register-postcode">Postcode:</label>
    <input type="text" id="register-postcode" name="register-postcode" placeholder="1111 AB" pattern="\d{4}\s[A-Z]{2}" required>
</div>

<div>
    <label for="register-address">Adres:</label>
    <input type="text" id="register-address" name="register-address" minlength="5" required>
</div>

<button type="submit" class="btn-secondary">Registreren</button>