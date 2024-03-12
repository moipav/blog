<?php

namespace P\Blog\Controllers;

use League\Plates\Engine;
use P\Blog\QueryBuilder;
class HomeController
{
    private QueryBuilder $builder;
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine('../src/Views');
        $this->builder = new QueryBuilder();
    }

    public function index(): string
    {

        $posts = $this->builder->getAll('posts');

        return $this->templates->render('homepage', ['posts' => $posts]);
    }
}