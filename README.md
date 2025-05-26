# 🎮 PhotoGallery 

Welcome to my PhotoGallery app, where we attempt to code something that already exists from big tech companies yayyy (google photos)

---

## 🚧 Current Issues
Although the project is mostly complete, a few issues remain:

to be filled in...

---

## 🛠 Installation
To install the project, follow these steps:

### 1️⃣ Clone the Repository:
```sh
git clone https://github.com/FazonPlay/app-photo-album

cd Fullstack_Project
```


### 2️⃣ Install Dependencies:
Ensure **Composer** is installed, then navigate to the project directory and run:
```sh
composer require fakerphp/faker
```
This installs Faker, which generates fake user data.

You'll also need **Dotenv** for secure database connections:
```sh
composer require vlucas/phpdotenv
```

### 3️⃣ Setup Database Configuration:
There's a `env.dist.` file in the root directory. Copy it and rename it to `.env`. 
This file contains the database configuration settings:
```
DB_HOST=""
DB_USER=""
DB_PASSWORD=""
DB_NAME=""
```
Replace the values with your actual database credentials.

### 4️⃣ Create the Database:
Use **phpMyAdmin** or any database management tool to create a database with the name specified in your `.env` file.


### 5️⃣ Import the Database:
Import the `photo_album.sql` file from the `database` folder into your database.

### 6️⃣ Generate Database Tables & Test Data:
Run the `script_to_gen_mockdata.php` in the command line to generate the necessary tables and sample data.

```
cd scripts
php script_to_gen_mockdata.php
php genTimes.php
```
### ONLY RUN THIS AFTER IMPORTING THE DATABASE

---

## 🎮 Usage
Once installed, open `index.php` to access the **dashboard**, where you’ll find:

✅ 
✅ 
✅ 

### 🔑 Logging In
- Click **Login** to access the login page.
- Register or log in as an **Admin** for full access.

### 👤 Admin Features
- **Admin Panel**
- **Full CRUD User List** (Note, you cannot create a new admin) // dw its temporary..
- Plus everything a normal user can do!

### 🎲 Normal User Features


---

## 🤝 Contributors
- **FazonPlay**
- **David**
- **RoshiBlack**

---

## 📜 License
📝 Open-source license (TBD)
tttt

---
✨ *Thank you for checking out my project!* ✨

