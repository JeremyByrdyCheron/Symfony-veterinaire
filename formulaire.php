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
    $phoneNumber = clear($_POST['phone']);
    $lastname = clear($_POST['name']);
    $firstname = clear($_POST['firstname']);

    $wantedDateCleaned = substr(str_replace('T', ' ', $wantedDate), 0, 10);

    $sql = "INSERT INTO appointment (type, email, animal, 	submitted_date, description, wanted_date, phone_number, lastname, firstname) 
            VALUES (:type, :email, :animal, :submittedDate, :description, :wantedDate, :phoneNumber, :lastname, :firstname)";

    try {
        $request = $pdo->prepare($sql);
        $request->execute([
            'type' => $type,
            'email' => $email,
            'animal' => $animal,
            'submittedDate' => $dateNow,
            'description' => $description,
            'wantedDate' => $wantedDateCleaned,
            'phoneNumber' => $phoneNumber,
            'lastname' => $lastname,
            'firstname' => $firstname,
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
<section id="formulaire">
    <div id="img_form">
        <img src="assets/img/illustration_form.jpg" alt="Illustration chien et veterinaires">
    </div>
    <form action="" method="post">
        <h2>Prenez votre rendez-vous !</h2>
        <div class="padd_form">
            <label for="name">Nom : </label>
            <input type="text" name="name" id="name" required />
        </div>
        <div class="padd_form">
            <label for="firstname">Prénom : </label>
            <input type="text" name="firstname" id="firstname" required />
        </div>
        <div class="padd_form">
            <label for="email">Adresse mail : </label>
            <input type="email" name="email" id="email" required />
        </div>
        <div class="padd_form">
            <label for="phone">Numéro de téléphone : </label>
            <input type="tel" name="phone" id="phone" required />
        </div>
        <div class="padd_form">
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
        <div class="padd_form">
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
        <div class="padd_form">
            <label for="info">Dites nous en plus :</label>
            <textarea id="info" name="info" rows="3" cols="25" placeholder="Informations complémentaires..."></textarea>
        </div>
        <div class="padd_form">
            <label for="dateTime">Date et Heure : </label>
            <!-- <input id="timeInput" type="time" min="09:00" max="18:00" step="3600"> -->
            <input type="datetime-local" id="dateTime" name="dateTime" required />
        </div>
        <button type="submit">Envoyer</button>
        <script>
            // const input = document.getElementById("dateTime");
            // input.addEventListener("input", () => {
            //     console.log()
            //     if (input.value < "09:00") {
            //         input.value = "09:00";
            //     }else if(input.value > "18:00"){
            //         input.value = "18:00"
            //     }
            // });
        </script>
    </form>
</section>

<?php include "assets/utils/footer.php"; ?>