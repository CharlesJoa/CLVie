<?php
include 'db.php';
global $pdo;

// Ajouter un article
if (isset($_POST['ajouter'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $date_creation = date('Y-m-d H:i:s');

    $stmt = $pdo->prepare("INSERT INTO articles (titre, contenu, date_creation) VALUES (?, ?, ?)");
    $stmt->execute([$titre, $contenu, $date_creation]);
}

// Modifier un article
if (isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];

    $stmt = $pdo->prepare("UPDATE articles SET titre = ?, contenu = ? WHERE id = ?");
    $stmt->execute([$titre, $contenu, $id]);
}

// Supprimer un article
if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];

    $stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->execute([$id]);
}

// Affichage des articles
$stmt = $pdo->query("SELECT * FROM articles");
$articles = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles</title>
</head>
<body>
<h1>Gestion des Articles</h1>

<h2>Ajouter un article</h2>
<form method="POST">
    <label for="titre">Titre :</label><br>
    <input type="text" id="titre" name="titre" required><br><br>
    <label for="contenu">Contenu :</label><br>
    <textarea id="contenu" name="contenu" required></textarea><br><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<h2>Liste des Articles</h2>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Date de Création</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo htmlspecialchars($article['titre']); ?></td>
            <td><?php echo htmlspecialchars($article['contenu']); ?></td>
            <td><?php echo $article['date_creation']; ?></td>
            <td>
                <a href="index.php?supprimer=<?php echo $article['id']; ?>">Supprimer</a>
                <a href="modifier.php?id=<?php echo $article['id']; ?>">Modifier</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
