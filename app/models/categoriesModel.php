<?php

namespace App\Models;

use \PDO;

function findAllCategories(PDO $conn): array
{
    $sql = "SELECT * 
            FROM categories 
            ORDER BY name";
    $rs = $conn->query($sql);
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findCategoriesWithPostCount(PDO $conn): array
{
    $sql = "SELECT c.id, c.name, COUNT(p.id) as total
            FROM categories c
            LEFT JOIN posts p ON c.id = p.category_id
            GROUP BY c.id
            ORDER BY c.name";
    $rs = $conn->prepare($sql);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

