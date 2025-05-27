<?php

function getPhotos(PDO $pdo, int $page = 1, int $itemsPerPage = 20): array|string {
    $offset = ($page - 1) * $itemsPerPage;
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM photos ORDER BY upload_date DESC LIMIT :limit OFFSET :offset";
    $prep = $pdo->prepare($query);
    $prep->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
    $prep->bindValue(':offset', $offset, PDO::PARAM_INT);

    try {
        $prep->execute();
        $photos = $prep->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

    $countQuery = "SELECT COUNT(*) AS total FROM photos";
    $countPrep = $pdo->prepare($countQuery);
    $countPrep->execute();
    $count = $countPrep->fetch(PDO::FETCH_ASSOC);

    return ['photos' => $photos, 'total' => $count['total']];
}

function addPhoto(PDO $pdo, string $title, string $filePath, int $userId): bool|string {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "INSERT INTO photos (title, file_path, user_id, upload_date) VALUES (:title, :file_path, :user_id, NOW())";
    $prep = $pdo->prepare($query);
    $prep->bindValue(':title', $title);
    $prep->bindValue(':file_path', $filePath);
    $prep->bindValue(':user_id', $userId, PDO::PARAM_INT);

    try {
        $prep->execute();
        return true;
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

function deletePhoto(PDO $pdo, int $photoId): bool|string {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "DELETE FROM photos WHERE photo_id = :photo_id";
    $prep = $pdo->prepare($query);
    $prep->bindValue(':photo_id', $photoId, PDO::PARAM_INT);

    try {
        $prep->execute();
        return true;
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}