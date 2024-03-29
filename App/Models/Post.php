<?php

namespace App\Models;

use PDO;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Post
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $host = '127.0.0.1';
        $dbname = 'mvc';
        $username = 'user';
        $password = 'password';
    
        try {
            $db = new PDO("mysql:host=$host;port=3306;dbname=$dbname;charset=utf8",
                          $username, $password);

            $stmt = $db->query('SELECT id, title, content FROM posts
                                ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}