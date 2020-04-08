<?php

namespace Blog\Model; // La classe sera dans ce namespace

require_once("model/Manager.php");

class PostManager extends Manager
{
  function getPosts()
  {
    $db = $this->dbConnect();
    $req = $db->query("SELECT id, title, content, to_char(creation_date, 'DD/MM/YYYY') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 5");

    return $req;
  }

  function getPost($postId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("SELECT id, title, content, to_char(creation_date, 'DD/MM/YYYY') AS creation_date_fr FROM posts WHERE id = ?");
    $req->execute(array($postId));
    $post = $req->fetch();

    return $post;
  }
}
