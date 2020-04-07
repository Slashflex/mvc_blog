<?php
require('./config.php');

function getPosts()
{
  $db = dbConnect();
  // On récupère les 5 derniers billets
  $req = $db->query("SELECT id, title, content, to_char(creation_date, 'dd-mm-YYYY à HH24:MM:SS') AS creation_date_fr FROM posts ORDER BY creation_date DESC");

  return $req;
}

function getPost($postId)
{
  $db = dbConnect();
  $req = $db->prepare("SELECT id, title, content, to_char(creation_date, 'dd-mm-YYYY à HH24:MM:SS') AS creation_date_fr FROM posts WHERE id = :id");
  $req->execute([
    ':id' => $postId
  ]);
  $post = $req->fetch();

  return $post;
}

function getComments($postId)
{
  $db = dbConnect();
  $comments = $db->prepare("SELECT id, author, comment, to_char(comment_date, 'dd-mm-YYYY à HH24:MM:SS') AS comment_date_fr FROM comments WHERE post_id = :id ORDER BY comment_date DESC");
  
  $comments->execute([
    ':id' => $postId
  ]);

  return $comments;
}

function dbConnect()
{
  try {
    $db = new PDO('pgsql:host=localhost;dbname=test_mvc', 'david', DB_PASSWORD);
    return $db;
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
}
