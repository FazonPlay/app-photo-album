<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use Exception;

class UsersController extends BaseController {
    private UserRepository $repository;

    public function __construct() {
        $this->repository = new UserRepository();
    }

    public function signup() {
        $errors = [];
        $success = null;
        $formData = [];

        if ($this->request->method === 'POST') {
            $formData = $this->request->request;

            // Basic validation
            if (empty($formData['username'])) {
                $errors['username'] = 'Username is required';
            }

            if (empty($formData['email'])) {
                $errors['email'] = 'Email is required';
            } elseif (!filter_var($formData['email'], FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Invalid email format';
            }

            if (empty($formData['password'])) {
                $errors['password'] = 'Password is required';
            } elseif (strlen($formData['password']) < 8) {
                $errors['password'] = 'Password must be at least 8 characters';
            }

            if ($formData['password'] !== $formData['confirm_password']) {
                $errors['confirm_password'] = 'Passwords do not match';
            }

            // If no errors, create user
            if (empty($errors)) {
                try {
                    $this->repository->createUser(
                        $formData['username'],
                        $formData['email'],
                        password_hash($formData['password'], PASSWORD_DEFAULT)
                    );

                    $success = true;
                    $formData = []; // Clear form
                } catch (Exception $e) {
                    $errors['general'] = $e->getMessage();
                }
            }
        }

        return $this->render('users/signup', [
            'title' => 'Sign Up - PhotoGallery',
            'errors' => $errors,
            'success' => $success,
            'formData' => $formData
        ]);
    }

    public function dashboard() {
//        if (!isset($_SESSION['user_id'])) {
//            exit;
//        }

//        $userId = $_SESSION['user_id'];
//        $user = $this->repository->get($userId);

        // Get user's recent albums, favorites, shared albums, and invitations
        // This will need additional repositories and methods

        return $this->render('users/dashboard', [
            'title' => 'Dashboard - PhotoGallery',
//            'user' => $user,
            'recentAlbums' => [], // Fetch from repository
            'favoritePhotos' => [], // Fetch from repository
            'sharedAlbums' => [], // Fetch from repository
            'pendingInvitations' => [] // Fetch from repository
        ]);
    }

    public function login() {
        $errors = [];

        if ($this->request->method === 'POST') {
            $formData = $this->request->request;

            if (empty($formData['email']) || empty($formData['password'])) {
                $errors['general'] = 'Please enter both email and password';
            } else {
                try {
                    $user = $this->repository->findByEmail($formData['email']);

                    if ($user && password_verify($formData['password'], $user->passwordHash)) {
                        // Start session and store user data
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        $_SESSION['user_id'] = $user->id;
                        $_SESSION['username'] = $user->username;

                        // Update last login
                        $this->repository->updateLastLogin($user->id);

                        // Redirect to gallery
                        header('Location: /gallery');
                        exit;
                    } else {
                        $errors['general'] = 'Invalid email or password';
                    }
                } catch (Exception $e) {
                    $errors['general'] = 'Invalid email or password';
                }
            }
        }

        return $this->render('users/login', [
            'title' => 'Log In - PhotoGallery',
            'errors' => $errors
        ]);
    }

    public function user(string $id) {
        return $this->render('users/specific', [
            'user' => $this->repository->get($id)
        ]);
    }
}