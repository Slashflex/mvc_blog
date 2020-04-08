<?php

namespace Blog\Model;

require_once("model/Manager.php");

class CommentManager extends Manager
{

  function getComments($postId)
  {
    $db = $this->dbConnect();
    $comments = $db->prepare("SELECT id, author, comment, to_char(comment_date, 'DD/MM/YYYY') AS creation_comment_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC");
    $comments->execute(array($postId));

    return $comments;
  }

  function getComment($commentId)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("SELECT id, post_id, author, comment, to_char(comment_date, 'DD/MM/YYYY') AS creation_comment_fr FROM comments WHERE id = ?");
    $req->execute(array($commentId));
    $comment = $req->fetch();

    return $comment;
  }

  function postComment($postId, $author, $comment)
  {
    $db = $this->dbConnect();
    $req = $db->prepare("INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())");
    $affectedLines = $req->execute(array($postId, $author, $comment));

    return $affectedLines;
  }

  function updateComment($commentId, $author, $comment)
  {
    $db = $this->dbconnect();
    $req = $db->prepare("UPDATE comments SET author = ?, comment = ? WHERE id = ?;");
    $affectedLines = $req->execute(array($author, $comment, $commentId));

    return $affectedLines;
  }
}
