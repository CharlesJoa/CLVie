<?php
include 'db.php';

// Récupérer l'article à modifier
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->execute([$id]);
    $article = $stmt->fetch();
}

// Modifier l'article
if (isset($_POST['modifier'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];

    $stmt = $pdo->prepare("UPDATE articles SET titre = ?, contenu = ? WHERE id = ?");
    $stmt->execute([$titre, $contenu, $id]);
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Article</title>
</head>
<body>
<h1>Modifier l'Article</h1>

<form method="POST">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars($article['titre']); ?>" required><br><br>
    <label for="contenu">Contenu :</label><br>
    <textarea id="contenu" name="contenu" required><?php echo htmlspecialchars($article['contenu']); ?></textarea><br><br>
    <button type="submit" name="modifier">Modifier</button>
</form>

<a href="index.php">Retour à la liste des articles</a>
</body>
</html>
