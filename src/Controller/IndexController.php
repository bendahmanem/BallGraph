<?php

namespace App\Controller;

class IndexController extends AbstractController
{
    public function index()
    {
        $this->render('index/index.php');
    }

    public function posts()
    {
        $this->render('index/posts.php');
    }

    public function post(int $id)
    {
        $this->render('index/post.php', [
            'id' => $id
        ]);
    }
}