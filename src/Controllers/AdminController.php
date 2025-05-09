<?php
namespace App\Controllers;

use App\Repositories\UserRepository;

class AdminController extends BaseController {
    private UserRepository $userRepository;

    public function __construct() {
        $this->userRepository = new UserRepository();
    }

    public function dashboard() {
        return $this->render('admin/dashboard', [
            'title' => 'Admin Dashboard'
        ]);
    }

    public function listUsers() {
        return $this->render('admin/users/list', [
            'users' => $this->userRepository->all()
        ]);
    }

    public function createUser() {
        // Handle form submission
        if ($this->request->method === 'POST') {
            // Create new user based on form data
            // For now just return success message
            return json_encode(['success' => true]);
        }

        // Show form
        return $this->render('admin/users/create', []);
    }

    public function editUser(string $id) {
        $user = $this->userRepository->get($id);

        if ($this->request->method === 'POST') {
            // Update user properties based on form data
            // $this->userRepository->save($user);
            return json_encode(['success' => true]);
        }

        return $this->render('admin/users/edit', [
            'user' => $user
        ]);
    }

    public function deleteUser(string $id) {
        $user = $this->userRepository->get($id);
        $this->userRepository->delete($user);

        // Redirect to user list
        header('Location: /admin/users');
        exit;
    }
}