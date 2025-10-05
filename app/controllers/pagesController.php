<?php

namespace App\Controllers\PagesController;

use \PDO;

function indexAction(PDO $conn)
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/categoriesModel.php';

    $limit = 10;
    $page = max(1, (int) ($_GET['page'] ?? 1));
    $offset = ($page - 1) * $limit;

    // Get posts and categories in parallel (if possible) or optimize queries
    $posts = \App\Models\postsModel\findPostsWithLimit($conn, $limit, $offset);
    $totalPosts = \App\Models\postsModel\findTotalPosts($conn);
    $categories = \App\Models\findCategoriesWithPostCount($conn);

    // Add category names to posts efficiently
    $categoriesById = array_column($categories, 'name', 'id');
    foreach ($posts as &$post) {
        $post['category'] = $categoriesById[$post['category_id']] ?? '';
    }
    unset($post);

    // Set view variables
    global $content, $title;
    $title = "Alex Parker - Blog";
    $currentPage = $page;
    $totalPages = ceil($totalPosts / $limit);
    $baseUrl = BASE_URL;

    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}
