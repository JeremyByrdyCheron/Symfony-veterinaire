<?php

function clear($char)
{
    return htmlspecialchars(trim($char));
}

include 'assets/function/connection.php';
$sql = 'SELECT token FROM document WHERE token=:code';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $request = $pdo->prepare($sql);
        $request->execute([
            'code' => $_POST['code']
        ]);
    } catch (PDOException $e) {
        $error = "Erreur lors de l'envoi : " . $e->getMessage();
        die();
    }
}
include 'assets/utils/header.php';
?>

<form action="" method="post">
    <div>
        <label for="code">Entrez votre code : </label>
        <input type="text" name="code" id="code" required />
    </div>
    <button type="submit">Valider</button>
</form>

<?php
include 'assets/utils/footer.php';
?>