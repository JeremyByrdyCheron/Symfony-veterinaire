<?php
include 'assets/function/connection.php';

$dateNow = date('Y-m-d H:i:s');

function clear($data)
{
    return htmlspecialchars(trim($data));
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["pet"])) {

    $email = clear($_POST['email']);
    $animal = clear($_POST['pet']);
    $type = clear($_POST['reason']);
    $description = clear($_POST['info']);
    $wantedDate = $_POST['dateTime'];

    $wantedDateCleaned = substr(str_replace('T', ' ', $wantedDate), 0, 10);

    $sql = "INSERT INTO request (type, email, animal, submittedDate, description, wantedDate) 
            VALUES (:type, :email, :animal, :submittedDate, :description, :wantedDate)";

    try {
        $request = $pdo->prepare($sql);
        $request->execute([
            'type' => $type,
            'email' => $email,
            'animal' => $animal,
            'submittedDate' => $dateNow,
            'description' => $description,
            'wantedDate' => $wantedDateCleaned
        ]);
        $success = "Votre demande a bien été envoyée !";
    } catch (PDOException $e) {
        $error = "Erreur lors de l'envoi : " . $e->getMessage();
    }
}

include "assets/utils/header.php";
?>

<?php if (isset($success))
    echo "<p style='color:green'>$success</p>"; ?>
<?php if (isset($error))
    echo "<p style='color:red'>$error</p>"; ?>

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
        <input type="tel" name="phone" id="phone" required />
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
        <input id="timeInput" type="time" min="09:00" max="18:00" step="3600">
        <input type="datetime-local" id="dateTime" name="dateTime" required />
    </div>
    <button type="submit">Envoyer</button>
    <script>
        const input = document.getElementById("dateTime");
        input.addEventListener("input", () => {
            console.log()
            if (input.value < "09:00") {
                input.value = "09:00";
            }else if(input.value > "18:00"){
                input.value = "18:00"
            }
        });
    </script>
</form>

<?php include "assets/utils/footer.php"; ?>