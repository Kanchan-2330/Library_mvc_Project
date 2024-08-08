<?php
include_once("model/Model.php");

class Controller
{
    public $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function showBooks()
    {
        if (!isset($_GET['book'])) {
            // no special book is requested, we'll show a list of all available books
            $books = $this->model->getBookList();
            include 'view\dashboard.php';
        } else {
            // show the requested book
            $book = $this->model->getBook($_GET['book']);
            include 'view/viewbook.php';
        }
    }
    //Function to open registration form
    public function showRegistration()
    {
        include 'view/pages-register.php';
    }
    //Function to open login form
    public function showLogin()
    {
        include 'view/login.php';
    }
    // funtion to logout user
    public function logoutUser()
{
    // Start the session if it hasn't already been started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Unset all of the session variables
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    // Finally, destroy the session
    session_destroy();

    // Redirect to the login page or any other page
    echo "<script>
            alert('Logout successful');
            window.location.href = '?action=login';
          </script>";
}

    public function showBookForm()
    {
        include 'view/book-form.php';
    }
    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Capture form data
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['pswd'] ?? '';

            // Call the model method to add the user
            $this->model->addUser($name, $email, $username, $password);
        }
    }
    //End of addUser()

    public function loginUser()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $this->test_input($_POST["username"]);
            $password = $this->test_input($_POST["password"]);

            if (empty($username) || empty($password)) {
                die("Error: Username and Password are required");
            }

            $user = $this->model->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION["user"] = [
                    "username" => $user["username"],
                    "email" => $user["email"], // Add other relevant user details
                    "name" => $user["name"]
                ];
                $_SESSION["username"] = $username;

                echo "<script>
                        alert('Login successful');
                        window.location.href = '?action=book';
                      </script>";
            } else {
                echo "<script>
                        alert('Invalid username or password');
                        window.location.href = '?action=login';
                      </script>";
            }
        }
    }
//End of loginUser()

    private function test_input($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }
    //Add new book function
    public function addNewBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Capture form data
            $title = $_POST['title'] ?? '';
            $author = $_POST['author'] ?? '';
            $price = $_POST['price'] ?? '';
            $stock = $_POST['stock'] ?? '';
            $language = $_POST['language'] ?? '';
            $description = $_POST['description'] ?? '';
            $genre = $_POST['genre'] ?? '';

            // Call the model method to add the user
            $this->model->addNewBook($title, $author, $price, $stock, $language, $description, $genre);
        }
    }

    //Function to delete book
    public function deleteBook()
    {
        $this->model->deleteBook();
    }
    //Function to edit book
    public function editBookForm()
    {
        // Check if book ID is provided

        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $book_id = intval($_GET['id']);

            // Retrieve the book details from the model
            $book = $this->model->getBookById($book_id);

            if ($book) {
                // Pass the book details to the view
                include 'view/editBook.php'; // Adjust path if necessary
            } else {
                echo "Book not found.";
            }
        } else {
            echo "Invalid book ID.";
        }
    }
    public function editBook()
    {
        $this->model->editBook();
    }
    //filter controller
  
    public function filterBooks() {
        $title_query = $_POST['title_query'] ?? '';
        $author_query = $_POST['author_query'] ?? '';
        $language = $_POST['language'] ?? '';
        $genre = $_POST['genre'] ?? '';

        $books = $this->model->searchBooks($title_query, $author_query, $language, $genre);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // Load only the table rows view for AJAX request
            include 'view/book_table_rows.php';
        } else {
            // Load the full dashboard view
            include 'view/dashboard.php';
        }
    }
  
}

