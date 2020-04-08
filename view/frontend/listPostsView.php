<?php $title = 'Mon Blog' ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
while ($data = $posts->fetch()) {
?>
  <div class="news">
    <h3>
      <?php echo htmlspecialchars($data['title']); ?>
      <em>le <?php echo $data['creation_date_fr']; ?></em>
    </h3>

    <p>
      <?php
      // On affiche le contenu du billet
      echo nl2br(htmlspecialchars($data['content']));
      ?>
      <br />
      <em><a href="index.php?action=post&id=<?= $data['id']; ?>">Commentaires</a></em>
    </p>
  </div>
<?php
} // Fin de la boucle des billets
$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>