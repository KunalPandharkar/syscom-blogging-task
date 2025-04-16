# 📝 Syscom Blogging System (Laravel 12)

A clean and modern blogging platform built using **Laravel 12**, **Blade**, **Bootstrap 5**, and **MySQL**.

---

## 🚀 Features

- User Registration & Login
- Create, Edit & Delete Blog Posts
- Comment on Posts
- Bootstrap 5 Responsive UI
- Redirect to Last Visited Page After Login

---

## ⚙️ Requirements

- PHP >= 8.2
- Composer
- Laravel 12
- MySQL (Database: `sysblogs`)
- Git

---

## 📘 API Routes Summary

| **Method** | **Endpoint**                     | **Route Name**        | **Description**                         |
|------------|----------------------------------|------------------------|-----------------------------------------|
| GET        | `/`                              | `home`                 | Show homepage                           |
| GET        | `/posts`                         | `show.posts`           | Get list of all posts                   |
| GET        | `/posts/{id}`                    | `show.post`            | Get a single post by ID                 |
| GET        | `/register`                      | `register`             | Show registration form                  |
| GET        | `/login`                         | `login`                | Show login form                         |
| POST       | `/register`                      | `user.register`        | Register a new user                     |
| POST       | `/login`                         | `user.login`           | Login user                              |
| POST       | `/logout`                        | `logout`               | Logout current user                     |
| GET        | `/profile/{id}`                  | `user.profile`         | Get user profile by ID                  |
| PUT        | `/profile/{id}`                  | `user.update`          | Update user profile info                |
| PUT        | `/profile/picture/{id}`          | `profile.picture`      | Update profile picture                  |
| GET        | `/user/{id}/posts`               | `user.posts`           | Get posts created by a specific user    |
| GET        | `/create/post`                   | `create.post`          | Show form to create a new post          |
| POST       | `/create/post`                   | `store.post`           | Store a newly created post              |
| GET        | `/post/{id}`                     | `get.update.post`      | Get post data for editing               |
| PUT        | `/post/{id}`                     | `update.post`          | Update a post                           |
| DELETE     | `/post/{id}`                     | `delete.post`          | Delete a post                           |
| POST       | `/post/{id}/comment`             | `comments.store`       | Add a comment to a post                 |
| DELETE     | `/comments/{id}`                 | `comments.delete`      | Delete a comment                        |
| PUT        | `/comments/{id}`                 | `comments.update`      | Update a comment                        |


## 🛠️ Installation Steps

Follow these steps to set up the project locally:

### 1. Clone the Project

```bash
git clone https://github.com/KunalPandharkar/syscom-blogging-task.git
cd syscom-blogging-task
