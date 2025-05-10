<?php

namespace App\Repositories;

use App\Models\User;
use Exception;

class UserRepository extends BaseRepository {
    public function get(string $id): User {
        $result = $this
            ->query("SELECT * FROM users WHERE user_id = :id")
            ->fetch(['id' => $id]);

        if (empty($result)) {
            throw new Exception("User with identifier $id does not exist");
        }

        return $this->createUserFromResult($result);
    }

    public function all(): array {
        $results = $this
            ->query("SELECT * FROM users")
            ->fetchAll();

        $users = [];
        foreach ($results as $result) {
            $users[] = $this->createUserFromResult($result);
        }

        return $users;
    }

    public function findByEmail(string $email) {
        $result = $this
            ->query("SELECT * FROM users WHERE email = :email")
            ->fetch(['email' => $email]);

        if (empty($result)) {
            throw new Exception("User with email $email not found");
        }

        return $this->createUserFromResult($result);
    }

    public function createUser(string $username, string $email, string $password_hash): User {
        // Check if user already exists
        $existing = $this
            ->query("SELECT COUNT(*) as count FROM users WHERE username = :username OR email = :email")
            ->fetch([
                'username' => $username,
                'email' => $email
            ]);

        if ($existing['count'] > 0) {
            throw new Exception("Username or email already exists");
        }

        $this->query("INSERT INTO users (username, email, password_hash) 
                     VALUES (:username, :email, :password_hash)")
            ->execute([
                'username' => $username,
                'email' => $email,
                'password_hash' => $password_hash
            ]);

        $newId = $this->getLastInsertId();

        // Create empty profile
        $this->query("INSERT INTO user_profiles (user_id) VALUES (:user_id)")
            ->execute(['user_id' => $newId]);

        return $this->get($newId);
    }

    public function updateLastLogin(string $userId): void {
        $this->query("UPDATE users SET last_login = NOW() WHERE user_id = :id")
            ->execute(['id' => $userId]);
    }

    private function createUserFromResult(array $result): User {
        // Update your User model to match the database fields
        return new User(
            $result['user_id'],
            $result['username'] ?? '',
            $result['email'] ?? '',
            $result['password_hash'] ?? '',
            $result['registration_date'] ?? '',
            $result['last_login'] ?? null,
            (bool)($result['is_active'] ?? 1)
        );
    }

    private function getLastInsertId(): string {
        return $this->query("SELECT LAST_INSERT_ID() as id")
            ->fetch([])['id'];
    }
}