<?php

namespace App\Controllers\PostsController;

use \PDO;

function indexAction(PDO $conn)
{
    include_once '../app/models/postsModel.php';
    $posts = \App\Models\postsModel\findAllPosts($conn);

    global $content, $title;
    $title = "Alex Parker - Blog";
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id)
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/categoriesModel.php';
    $post = \App\Models\postsModel\findOneById($conn, $id);

    // Get category name
    $categories = \App\Models\findAllCategories($conn);
    $post['category'] = array_column($categories, 'name', 'id')[$post['category_id']] ?? '';

    global $content, $title;
    $title = "Alex Parker - " . ($post['title'] ?? "Post");
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}

function newAction(PDO $conn)
{
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\findAllCategories($conn);

    global $content, $title;
    $title = "Alex Parker - Add a post";
    ob_start();
    include '../app/views/posts/new.php';
    $content = ob_get_clean();
}

function createAction(PDO $conn, array $data)
{
    $data['created_at'] = date('Y-m-d H:i:s');

    // Handle image upload
    if (!empty($_FILES['image_file']['name'])) {
        $uploadDir = dirname(__DIR__, 2) . '/public/template/images/blog/';
        $uploadFile = $uploadDir . basename($_FILES['image_file']['name']);

        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadFile)) {
            $data['image'] = $_FILES['image_file']['name'];
        }
    }

    include_once '../app/models/postsModel.php';
    \App\Models\postsModel\createPosts($conn, $data);
    header('Location: ' . BASE_URL);
    exit;
}

function editAction(PDO $conn, int $id)
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/categoriesModel.php';
    $post = \App\Models\postsModel\findOneById($conn, $id);
    $categories = \App\Models\findAllCategories($conn);

    global $content, $title;
    $title = "Alex Parker - Edit a post";
    ob_start();
    include '../app/views/posts/edit.php';
    $content = ob_get_clean();
}

function updateAction(PDO $conn, int $id, array $data)
{
    // Handle image upload
    if (!empty($_FILES['image_file']['name'])) {
        $uploadDir = dirname(__DIR__, 2) . '/public/template/images/blog/';
        $uploadFile = $uploadDir . basename($_FILES['image_file']['name']);

        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadFile)) {
            $data['image'] = $_FILES['image_file']['name'];
        }
    }

    include_once '../app/models/postsModel.php';
    include_once '../core/helpers.php';
    \App\Models\postsModel\updatePosts($conn, $id, $data);
    header("Location: " . BASE_URL . "posts/$id/" . \Core\Helpers\slugify($data['title']) . ".html");
    exit;
}

function deleteAction(PDO $conn, int $id)
{
    include_once '../app/models/postsModel.php';
    \App\Models\postsModel\postsDelete($conn, $id);
    header("Location: " . BASE_URL);
    exit;
}
