<?php
include "assets/utils/header.php"
?>

<form action="" method="post">
    <div>
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name" required />
    </div>
    <div>
        <label for="firstname">Prénom : </label>
        <input type="text" name="firstname" id="firstname" required />
    </div>
    <div>
        <label for="email">Adresse mail : </label>
        <input type="email" name="email" id="email" required />
    </div>
    <div>
        <label for="phone">Numéro de téléphone : </label>
        <input type="number" name="phone" id="phone" required />
    </div>
    <div>
        <label for="pet">Votre animal : </label>
        <select name="pet" id="pet" required>
            <option value="">--Choisissez--</option>
            <option value="dog">Chien</option>
            <option value="cat">Chat</option>
            <option value="rabbit">Lapin</option>
            <option value="guineaPig">Cochon d'Inde</option>
            <option value="hamster">Hamster</option>
            <option value="bird">Oiseau</option>
            <option value="Reptile">Reptile</option>
            <option value="others">Autres</option>
        </select>
    </div>
        <div>
        <label for="reason">Motif de la visite : </label>
        <select name="reason" id="reason" required>
            <option value="">--Choisissez--</option>
            <option value="emergency">Urgence</option>
            <option value="vaccination">Vaccination</option>
            <option value="sterilization">Stérilisation</option>
            <option value="check">Bilan de santé</option>
            <option value="identification">Identification</option>
            <option value="dermatology">Dermatologie</option>
            <option value="wound">Blessures</option>
            <option value="other">Autres</option>
        </select>
    </div>
    <div>
        <label for="info">Dites nous en plus :</label>
        <textarea id="info" name="info" rows="5" cols="33" placeholder="Informations complémentaires..."></textarea>
    </div>
    <div>
        <label for="dateTime">Date et Heure : </label>
        <input type="datetime-local" id="dateTime" name="dateTime" value="AAAA-MM-JJ" required />
    </div>
    <button type="submit">Envoyer</button>
</form>

<?php
include "assets/utils/footer.php"
?>