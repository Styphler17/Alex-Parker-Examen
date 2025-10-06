<?php

namespace App\Controllers\CategoriesController;

use \PDO;

function categoriesIndexAction(PDO $conn): void
{
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\findAllCategories($conn);

    global $content, $title;
    $title = "Alex Parker - Categories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}
