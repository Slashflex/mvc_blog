<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
  $postManager = new Blog\Model\PostManager(); // Création d'un objet
  $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

  require('view/frontend/listPostsView.php');
}

function post()
{
  $postManager = new Blog\Model\PostManager();
  $commentManager = new Blog\Model\CommentManager();

  $post = $postManager->getPost($_GET['id']);
  $comments = $commentManager->getComments($_GET['id']);

  require('view/frontend/postView.php');
}

function editComment()
{
  $commentManager = new Blog\Model\CommentManager();

  $comment = $commentManager->getComment($_GET['id']);

  require('view/frontend/editCommentView.php');
}

function addComment($postId, $author, $comment)
{
  $commentManager = new Blog\Model\CommentManager();

  $affectedLines = $commentManager->postComment($postId, $author, $comment);

  if ($affectedLines === false) {
    throw new Exception('Impossible d\'ajouter le commentaire !');
  } else {
    header('Location: index.php?action=post&id=' . $postId);
  }
}

function patchComment($commentId, $author, $comment, $postId)
{

  $commentManager = new Blog\Model\CommentManager();

  $newComment = $commentManager->updateComment($commentId, $author, $comment);

  if ($newComment === false) {
    throw new Exception('Impossible de modifier le commentaire !');
  } else {
    echo $postId;
    header("Location: index.php?action=post&id=" . $postId);
  }
}
