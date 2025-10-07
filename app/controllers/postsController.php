<?php

namespace App\Controllers\PostsController;

use \PDO;


function indexAction(PDO $conn): void
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/categoriesModel.php';
    
    // Pagination setup
    $postsPerPage = 10;
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $currentPage = max(1, $currentPage); // Ensure page is at least 1
    $offset = ($currentPage - 1) * $postsPerPage;
    
    // Get posts with pagination
    $posts = \App\Models\postsModel\findPostsWithLimit($conn, $postsPerPage, $offset);
    $totalPosts = \App\Models\postsModel\findTotalPosts($conn);
    $totalPages = ceil($totalPosts / $postsPerPage);

    global $content, $title, $categories;

    $categories = \App\Models\findCategoriesWithPostCount($conn);
    $title = "Alex Parker - Blog";
    
    // Make pagination variables available to the view
    $baseUrl = BASE_URL;
    
    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}

function showAction(PDO $conn, int $id): void
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/categoriesModel.php';
    $post = \App\Models\postsModel\findOneById($conn, $id);

    global $content, $title, $categories;
    
    $categories = \App\Models\findCategoriesWithPostCount($conn);
    $title = "Alex Parker - " . ($post['title'] ?? "Post");
    ob_start();
    include '../app/views/posts/show.php';
    $content = ob_get_clean();
}

function newAction(PDO $conn): void
{
    include_once '../app/models/categoriesModel.php';

    global $content, $title, $categories;
    
    $categories = \App\Models\findCategoriesWithPostCount($conn);
    
    $title = "Alex Parker - Add a post";
    ob_start();
    include '../app/views/posts/new.php';
    $content = ob_get_clean();
}

function createAction(PDO $conn, array $data): void
{
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['image'] = $data['image'] ?? '';
    $data['quote'] = $data['quote'] ?? '';

    // Handle image upload
    if (!empty($_FILES['image_file']['name'])) {
        $uploadDir = dirname(__DIR__, 2) . '/public/template/images/blog/';

        $originalName = $_FILES['image_file']['name'];
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        
        $newFileName = time() . '_' . substr(md5(uniqid()), 0, 8) . '.' . $extension;
        
        if (strlen($newFileName) > 45) {
            $newFileName = time() . '.' . $extension;
        }
        
        $uploadFile = $uploadDir . $newFileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadFile)) {
            $data['image'] = $newFileName;
        }
    }

    include_once '../app/models/postsModel.php';
    \App\Models\postsModel\createPosts($conn, $data);
    header('Location: ' . BASE_URL);
    exit;
}

function editAction(PDO $conn, int $id): void
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/categoriesModel.php';
    $post = \App\Models\postsModel\findOneById($conn, $id);
    
    global $content, $title, $categories;
    
    $categories = \App\Models\findCategoriesWithPostCount($conn);
    $title = "Alex Parker - Edit a post";
    ob_start();
    include '../app/views/posts/edit.php';
    $content = ob_get_clean();
}

function updateAction(PDO $conn, int $id, array $data): void
{
    // Handle image upload
    if (!empty($_FILES['image_file']['name'])) {
        $uploadDir = dirname(__DIR__, 2) . '/public/template/images/blog/';
        
        $originalName = $_FILES['image_file']['name'];
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        
        $newFileName = time() . '_' . substr(md5(uniqid()), 0, 8) . '.' . $extension;
        
        if (strlen($newFileName) > 45) {
            $newFileName = time() . '.' . $extension;
        }
        
        $uploadFile = $uploadDir . $newFileName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($_FILES['image_file']['tmp_name'], $uploadFile)) {
            $data['image'] = $newFileName;
        }
    }

    include_once '../app/models/postsModel.php';
    include_once '../core/helpers.php';
    \App\Models\postsModel\updatePosts($conn, $id, $data);
    header("Location: " . BASE_URL . "posts/$id/" . \Core\Helpers\slugify($data['title']));
    exit;
}

function deleteAction(PDO $conn, int $id): void
{
    include_once '../app/models/postsModel.php';
    \App\Models\postsModel\postsDelete($conn, $id);
    header("Location: " . BASE_URL);
    exit;
}
