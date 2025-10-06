<?php

require_once __DIR__ . '/../controllers/postsController.php';

$action = $_GET['posts'] ?? 'home';

switch ($action) {
    case 'add': // show add form (professor used `add`)
        \App\Controllers\PostsController\newAction($conn);
        break;

    case 'show':
        $id = (int)($_GET['id'] ?? 0);
        $slug = $_GET['slug'] ?? '';
        \App\Controllers\PostsController\showAction($conn, $id);
        break;

    case 'insert':
        \App\Controllers\PostsController\createAction($conn, $_POST);
        break;

    case 'edit':
        $id = (int)($_GET['id'] ?? 0);
        \App\Controllers\PostsController\editAction($conn, $id);
        break;

    case 'update':
        $id = (int)($_GET['id'] ?? 0);
        \App\Controllers\PostsController\updateAction($conn, $id, $_POST);
        break;

    case 'delete':
        $id = (int)($_GET['id'] ?? 0);
        \App\Controllers\PostsController\deleteAction($conn, $id);
        break;

    case 'home':
    default:
        \App\Controllers\PostsController\indexAction($conn);
        break;
}
