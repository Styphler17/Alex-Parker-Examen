<?php

require_once '../App/controllers/postsController.php';

$action = $_GET['posts'] ?? 'index';
$id = (int)($_GET['id'] ?? 0);
$slug = $_GET['slug'] ?? '';

switch ($action) {
    case 'addform': 
        \App\Controllers\PostsController\newAction($conn);
        break;

    case 'show':
        \App\Controllers\PostsController\showAction($conn, $id);
        break;

    case 'insert':
        \App\Controllers\PostsController\createAction($conn, $_POST);
        break;

    case 'editform':
        \App\Controllers\PostsController\editAction($conn, $id);
        break;

    case 'update':
        \App\Controllers\PostsController\updateAction($conn, $id, $_POST);
        break;

    case 'delete':
        \App\Controllers\PostsController\deleteAction($conn, $id);
        break;

    case 'index':
    default:
        \App\Controllers\PostsController\indexAction($conn);
        break;
}
