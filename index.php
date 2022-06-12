
<?php
require_once('pdo.php');

$requete = 'SELECT *, DATE_FORMAT(date, "%d/%m/%Y à %H:%i:%s")AS formated_date FROM message';
// PDO::query — Prépare et Exécute une requête SQL sans marque substitutive
$statement = $pdo->query($requete);
// PDOStatement::fetchAll — Récupère les lignes restantes d'un ensemble de résultats

$message = $statement->fetchAll();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>mini-tchat</title>

</head>

<body>
    <main>
    <section>
            <form class="formulaire" action="tchat.php" method="POST">
                <label for="name">pseudo</label>
                <input type="text" name="name" placeholder="ajouter votre pseudo !" value='<?= isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>'>
                <label for="message">Message</label>
                <input type="text" name="message" placeholder="ajouter votre message !" <?= isset($_SESSION['name']) ? 'autofocus' : '' ?> >
                <button type="submit">Envoyer</button>
            </form>
        <table class="table">
            <thead>
                <tr>
    
                    <th scope="col">name</th>
                    <th scope="col">message</th>
                    <th scope="col">date</th>
                </tr>
            </thead>
            <!-- La structure de langage foreach fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets -->
           <?php foreach($message as $message): ?>

    
                <tr>
                        <td><?= $message['name'] ?></td>
                        <td><?= $message['message'] ?></td>
                        <td><?= $message['formated_date'] ?></td>
                    </tr>
                <?php endforeach ?>
                </tr>
            </tbody>
        </table>
    </section>
    </main>
</body>

</html>
