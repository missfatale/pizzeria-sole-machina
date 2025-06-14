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
    <label for="first-name">Voornaam:</label>
    <input type="text" id="first-name" name="first_name" pattern="[A-Za-z\s]+" maxlength="15" required>
</div>

<div>
    <label for="last-name">Achternaam:</label>
    <input type="text" id="last-name" name="last_name" pattern="[A-Za-z\s]+" maxlength="15" required>
</div>

<div>
    <label for="geboortedatum">Geboortedatum:</label>
    <input type="date" id="geboortedatum" name="geboortedatum" required>
</div>

<div>
    <label for="username">Gebruikersnaam:</label>
    <input type="text" id="username" name="username" minlength="3" required>
</div>

<div>
    <label for="password">Wachtwoord:</label>
    <input type="password" id="password" name="password" minlength="8" required>
</div>

<div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" minlength="5" placeholder="gebruiker@provider.nl" required>
</div>

<div>
    <label for="mobile">Mobiele Nummer:</label>
    <input type="text" id="mobile" name="mobile" placeholder="06-00000000" pattern="06-\d{8}" title="Must be in the format 06-XXXXXXXX" required>
</div>

<div>
    <label for="postcode">Postcode:</label>
    <input type="text" id="postcode" name="postcode" placeholder="1111 AB" pattern="\d{4}\s[A-Z]{2}" required>
</div>

<div>
    <label for="address">Adres:</label>
    <input type="text" id="address" name="address" minlength="5" required>
</div>

<button type="submit" class="btn-secondary">Registreren</button>