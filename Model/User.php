<?php

require_once __DIR__ . '/connection.php';

class User
{
    public static function create($fullname, $email, $password)
    {
        $connection = Connection::getConnection();

        $sql = "INSERT INTO users
                (user_fullname, email, password)
                VALUES
                (:fullname, :email, :password)";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':fullname', $fullname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(
            ':password',
            password_hash($password, PASSWORD_DEFAULT)
        );

        return $stmt->execute();
    }

    public static function findByEmail($email)
    {
        $connection = Connection::getConnection();

        $sql = "SELECT * FROM users
                WHERE email = :email";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function findById($id)
    {
        $connection = Connection::getConnection();

        $sql = "SELECT * FROM users
                WHERE id = :id";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateProfile($id, $fullname, $email)
    {
        $connection = Connection::getConnection();

        $sql = "UPDATE users
                SET user_fullname = :fullname,
                    email = :email
                WHERE id = :id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(':fullname', $fullname);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    public static function updatePassword($id, $password)
    {
        $connection = Connection::getConnection();

        $sql = "UPDATE users
                SET password = :password
                WHERE id = :id";

        $stmt = $connection->prepare($sql);

        $stmt->bindValue(
            ':password',
            password_hash($password, PASSWORD_DEFAULT)
        );

        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

    public static function delete($id)
    {
        $connection = Connection::getConnection();

        $sql = "DELETE FROM users
                WHERE id = :id";

        $stmt = $connection->prepare($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}