<?php

namespace App\Controllers\PagesController;

use \PDO;

function indexAction(PDO $conn): void
{
    include_once '../app/models/postsModel.php';
    include_once '../app/models/categoriesModel.php';
    
    global $content, $title, $categories;

    $limit = 10;
    $page = max(1, (int) ($_GET['page'] ?? 1));
    $offset = ($page - 1) * $limit;

    $posts = \App\Models\postsModel\findPostsWithLimit($conn, $limit, $offset);
    $totalPosts = \App\Models\postsModel\findTotalPosts($conn);
    $categories = \App\Models\findCategoriesWithPostCount($conn);

    $categoriesById = array_column($categories, 'name', 'id');
    foreach ($posts as &$post) {
        $post['category'] = $categoriesById[$post['category_id']] ?? '';
    }
    unset($post);

    $title = "Alex Parker - Blog";
    $currentPage = $page;
    $totalPages = ceil($totalPosts / $limit);
    $baseUrl = BASE_URL;


    ob_start();
    include '../app/views/posts/index.php';
    $content = ob_get_clean();
}
