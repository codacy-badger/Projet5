<?php


namespace Src\Domain\Managers;

use App\Bdd\Manager;
use Src\Domain\Models\Post;

class PostManager extends Manager
{

    public function getPosts()
    {
        $req = $this->getConnexion()->query('SELECT * FROM posts ORDER BY id DESC');

        return $req->fetchAll();
    }

    public function getPost($id)
    {
        $req = $this->getConnexion()->prepare("SELECT * FROM posts WHERE posted= 'on' AND id = ?");
        $req->execute($id);
        return $post = $req->fetch();
    }

    public function notValidePost()
    {
        $query = $this->getConnexion()->prepare("SELECT COUNT(id) FROM posts SET seen='off' ");
        return $query->fetch();
    }

    public function addPost(Post $post)
    {

        $req = $this->getConnexion()->prepare("INSERT INTO posts(title,content,date,posted) VALUES (:title,:content,NOW(),:posted)");

        $req->bindValue(':nom', $post->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':content', $post->getContent(), \PDO::PARAM_STR);
        $req->bindValue(':posted', $post->getPosted(), \PDO::PARAM_STR);
        $req->execute();

    }

    public function updatePost(Post $post)
    {

        $req = $this->getConnexion()->prepare("UPDATE posts SET title=:title, content=:content, datemodify=NOW(), posted=:posted WHERE id=:id");

        $req->bindValue(':id',$post->getId(),\PDO::PARAM_INT);
        $req->bindValue(':title',$post->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(':content',$post->getContent(),\PDO::PARAM_STR);
        $req->bindValue(':posted',$post->getPosted(),\PDO::PARAM_STR);



        $req->execute();
    }

    public function delPost($id)
    {
        $req = $this->getConnexion()->prepare("DELETE FROM posts WHERE id=? ");
        $req->execute(array($id));

    }
}