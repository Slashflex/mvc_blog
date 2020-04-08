<?php $title = "Modifier un commentaire" ?>

<?php ob_start(); ?>

<form action="index.php?action=updateComment&id=<?= $comment['id'] ?>" method="post">
  <div>
    <label for="author">Auteur</label><br />
    <input type="text" id="author" name="author" />
  </div>
  <div>
    <label for="comment">Commentaire</label><br />
    <textarea id="comment" name="comment"></textarea>
  </div>
  <div>
    <input type="hidden" id="postId" name="postId" value="<?= $comment['post_id'] ?>" />
    <input type="submit" />
  </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>