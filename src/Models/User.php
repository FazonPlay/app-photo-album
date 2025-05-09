<?php

namespace App\Models;

class User {
    public function __construct(
        public string $id,
        public string $firstName,
        public string $lastName,
        public int $age,
        public string $location
    ){}


}