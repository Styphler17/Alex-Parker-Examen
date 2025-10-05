<?php

namespace App\Models\postsModel;

use \PDO;

function findAllPosts(PDO $conn): array
{
    $sql = "SELECT * 
            FROM posts 
            ORDER BY created_at DESC";
    $rs = $conn->prepare($sql);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findOneById(PDO $conn, int $id): array
{
    $sql = "SELECT * 
            FROM posts 
            WHERE id = :id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(PDO::FETCH_ASSOC);
}

function createPosts(PDO $conn, array $data): bool
{
    $sql = "INSERT INTO posts SET
            title = :title, 
            text = :text, 
            created_at = :created_at, 
            quote = :quote, 
            image = :image, 
            category_id = :category_id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':text', $data['text'], PDO::PARAM_STR);
    $rs->bindValue(':created_at', $data['created_at'], PDO::PARAM_STR);
    $rs->bindValue(':quote', $data['quote'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    return $rs->execute();
}

function updatePosts(PDO $conn, int $id, array $data): bool
{
    $sql = "UPDATE posts SET 
            title = :title,
            text = :text,
            quote = :quote,
            image = :image,
            category_id = :category_id
            WHERE id = :id";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':title', $data['title'], PDO::PARAM_STR);
    $rs->bindValue(':text', $data['text'], PDO::PARAM_STR);
    $rs->bindValue(':quote', $data['quote'], PDO::PARAM_STR);
    $rs->bindValue(':image', $data['image'], PDO::PARAM_STR);
    $rs->bindValue(':category_id', $data['category_id'], PDO::PARAM_INT);
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return $rs->execute();
}

function postsDelete(PDO $conn, int $id): bool
{
    $rs = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $rs->bindValue(':id', $id, PDO::PARAM_INT);
    return $rs->execute();
}

function findPostsWithLimit(PDO $conn, int $limit, int $offset): array
{
    $sql = "SELECT * 
            FROM posts 
            ORDER BY created_at DESC 
            LIMIT :limit 
            OFFSET :offset";
    $rs = $conn->prepare($sql);
    $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
    $rs->bindValue(':offset', $offset, PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(PDO::FETCH_ASSOC);
}

function findTotalPosts(PDO $conn): int
{
    $sql = "SELECT COUNT(*) as total FROM posts";
    $rs = $conn->query($sql);
    $row = $rs->fetch(PDO::FETCH_ASSOC);
    return (int) ($row['total'] ?? 0);
}
