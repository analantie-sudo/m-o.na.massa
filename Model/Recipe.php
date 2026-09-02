<?php

require_once __DIR__ . '/connection.php';

class Recipe
{
    public static function create($title, $ingredients, $preparation, $image, $userid_fk)
    {
        $connection = Connection::getConnection();

        $sql = "INSERT INTO recipes
                (title, ingredients, preparation, image, userid_fk)
                VALUES
                (:title, :ingredients, :preparation, :image, :userid_fk)";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':ingredients', $ingredients);
        $stmt->bindValue(':preparation', $preparation);
        $stmt->bindValue(':image', $image);
        $stmt->bindValue(':userid_fk', $userid_fk);

        return $stmt->execute();
    }

    public static function getAll()
    {
        $connection = Connection::getConnection();

        $sql = "SELECT * FROM recipes
                ORDER BY created_at DESC";

        $stmt = $connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById($id)
    {
        $connection = Connection::getConnection();

        $sql = "SELECT * FROM recipes
                WHERE id = :id";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getByUser($userid_fk)
    {
        $connection = Connection::getConnection();

        $sql = "SELECT * FROM recipes
                WHERE userid_fk = :userid_fk
                ORDER BY created_at DESC";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':userid_fk', $userid_fk);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id, $userid_fk)
    {
        $connection = Connection::getConnection();

        $sql = "DELETE FROM recipes
                WHERE id = :id
                AND userid_fk = :userid_fk";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':userid_fk', $userid_fk);

        return $stmt->execute();
    }

    public static function deleteByUser($userid_fk)
    {
        $connection = Connection::getConnection();

        $sql = "DELETE FROM recipes
                WHERE userid_fk = :userid_fk";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':userid_fk', $userid_fk);

        return $stmt->execute();
    }
}