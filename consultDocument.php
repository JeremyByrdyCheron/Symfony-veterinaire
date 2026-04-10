<?php
session_start();
include 'assets/function/connection.php';


$token = $_GET['token'] ?? null;

if (!$token) {
    die("Lien invalide : aucun jeton d'accès fourni.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
    $codeSaisi = trim($_POST['code']);


    $stmt = $pdo->prepare("SELECT * FROM document WHERE token = :token LIMIT 1");
    $stmt->execute(['token' => $token]);
    $doc = $stmt->fetch();

    if ($doc && $doc['code'] === $codeSaisi) {

        $_SESSION['access_' . $token] = true;

        header("Location: " . $_SERVER['PHP_SELF'] . "?token=" . urlencode($token));
        exit;
    } else {
        $error = "Code d'accès incorrect.";
    }
}


if (isset($_SESSION['access_' . $token]) && $_SESSION['access_' . $token] === true) {

    $stmt = $pdo->prepare("SELECT fichier FROM document WHERE token = :token LIMIT 1");
    $stmt->execute(['token' => $token]);
    $doc = $stmt->fetch();
    if ($doc && file_exists($doc['fichier'])) {
        ob_clean();
        header("Content-Type: application/pdf");
        header("Content-Disposition: inline; filename=\"document.pdf\"");
        readfile($doc['fichier']);
        exit;
    } else {
        die("Fichier introuvable sur le serveur.");
    }
}

include 'assets/utils/header.php';
?>

<div class="container">
    <h2>Accès sécurisé au document</h2>

    <form method="POST">
        <label for="code">Veuillez saisir le code d'accès :</label><br>
        <input type="text" name="code" id="code" maxlength="6" placeholder="Ex: 123456" required>
        <button type="submit">Valider</button>
    </form>
</div>

<?php
include 'assets/utils/footer.php';
?>