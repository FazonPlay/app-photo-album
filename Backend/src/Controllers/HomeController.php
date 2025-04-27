<?php 

namespace App\Controllers;

use App\Models\User;

class HomeController extends BaseController {
    
    public function index() {
        return $this->render('home', [
            'nom' => 'niiger',
//            'users' => User::getAll()
        ]);
    }
    public function ping() {
        header('Content-Type: application/json');
        return json_encode(['status' => 'success', 'message' => 'Backend is running!']);
    }



}