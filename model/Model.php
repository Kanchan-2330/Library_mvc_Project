<?php
include_once("model/Book.php");
include_once("model/user.php");
require_once 'model/Database.php';
class Model {
	private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }
    public function getBook(){

    }
    public function getUserList(){
        
    }
    
    //Function to get bookss
    public function getBookList()
{
    try {
        $sql = "SELECT id, title, author, price, stock, language, description, genre FROM books";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Query Error: ' . $e->getMessage();
        return []; // Return an empty array or handle the error as needed
    }
}
	//Function to get users
    public function addUser($name, $email, $username, $password) {

         // Hash the password before storing it
         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Prepare the SQL statement
        $sql = "INSERT INTO users (name, email, username, password) VALUES (:name, :email, :username, :password)";
        $stmt = $this->db->prepare($sql); // Assuming $this->db is your PDO instance
    
        if ($stmt === false) {
            die("Error: " . $this->db->errorInfo()[2]); // Get error from PDO
        }
    
        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword);
    
        // Execute the statement
        $success = $stmt->execute();
    
        if ($success) {
            // Redirect using PHP header function
            echo "<script>
    alert('New record created successfully');
    window.location.href = '?action=login';
  </script>";


            exit(); // Make sure to call exit after header redirect
        } else {
            echo "Error: " . $stmt->errorInfo()[2]; // Show the error from PDO
        }
    }
//end registration function

public function getUserByUsername($username) {
    $sql = "SELECT id, username,name,email, password FROM users WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
     
    // Assuming you have a method for sanitization
    private function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //end of LoginUser Function

    //Function to add new Book
public function addNewBook($title,$author,$price,$stock,$language,$description,$genre){
     // Prepare the SQL statement
     $sql = "INSERT INTO books (title,author,price,stock,language,description,genre) VALUES (:title, :author, :price, :stock,:language,:description,:genre)";
     $stmt = $this->db->prepare($sql); // Assuming $this->db is your PDO instance
 
     if ($stmt === false) {
         die("Error: " . $this->db->errorInfo()[2]); // Get error from PDO
     }
 
     // Bind parameters
     $stmt->bindParam(':title', $title);
     $stmt->bindParam(':author', $author);
     $stmt->bindParam(':price', $price);
     $stmt->bindParam(':stock', $stock);
     $stmt->bindParam(':language', $language);
     $stmt->bindParam(':description', $description);
     $stmt->bindParam(':genre', $genre);
 
 
     // Execute the statement
     $success = $stmt->execute();
 
     if ($success) {
         // Redirect using PHP header function
         echo "<script>
 alert('New Book added successfully');
 window.location.href ='?action=book';
</script>";


         exit(); // Make sure to call exit after header redirect
     } else {
         echo "Error: " . $stmt->errorInfo()[2]; // Show the error from PDO
     }
}
//end of addBook Funcion
//Function to delete a book

public function deleteBook() {
    // Ensure the book ID is provided and is an integer
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $book_id = intval($_GET['id']);

        try {
            // Prepare the SQL delete statement
            $sql = "DELETE FROM books WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $book_id, PDO::PARAM_INT);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<script>
                alert('Book deleted successfully');
                window.location.href ='?action=book';
                </script>";
            } else {
                echo "Error deleting record: " . implode(", ", $stmt->errorInfo());
            }

            // Close the statement
            $stmt = null;
            exit;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        echo "Invalid book ID";
    }
}
//Function to edit Book Details
public function editBookForm(){
      
}
public function getBookById($id) {
    $sql = "SELECT * FROM books WHERE id = :id";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    public function editBook() {
        // Check if the form was submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ensure book ID is provided
            if (isset($_POST['id']) && is_numeric($_POST['id'])) {
                $book_id = intval($_POST['id']);
                
                // Sanitize and retrieve form data
                $title = htmlspecialchars($_POST['title']);
                $author = htmlspecialchars($_POST['author']);
                $price = floatval($_POST['price']);
                $stock = intval($_POST['stock']);
                $language = htmlspecialchars($_POST['language']);
                $description = htmlspecialchars($_POST['description']);
                $genre = htmlspecialchars($_POST['genre']);
                
                echo "<script> console.log($title)</script>";
                try {
                    // Prepare the SQL update statement
                    $sql = "UPDATE books SET title = :title, author = :author, price = :price, stock = :stock, language = :language, description = :description, genre = :genre WHERE id = :id";
                    $stmt = $this->db->prepare($sql);

                    // Bind parameters
                    $stmt->bindParam(':title', $title);
                    $stmt->bindParam(':author', $author);
                    $stmt->bindParam(':price', $price);
                    $stmt->bindParam(':stock', $stock);
                    $stmt->bindParam(':language', $language);
                    $stmt->bindParam(':description', $description);
                    $stmt->bindParam(':genre', $genre);
                    $stmt->bindParam(':id', $book_id, PDO::PARAM_INT);


                    // Execute the statement
                    if ($stmt->execute()) {
                        echo "<script>
                        alert('Book updated successfully');
                        window.location.href = '?action=book';
                        </script>";
                    } else {
                        echo "Error updating record: " . implode(", ", $stmt->errorInfo());
                    }

                    // Close the statement
                    $stmt = null;
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            } else {
                echo "Invalid Book ID";
            }
        } else {
            echo "Invalid request method";
        }
    }

   
    public function searchBooks($title_query, $author_query, $language, $genre) {
        $sql = "SELECT * FROM books WHERE 1=1";
        $params = [];

        if (!empty($title_query)) {
            $sql .= " AND title LIKE ?";
            $params[] = "%$title_query%";
        }

        if (!empty($author_query)) {
            $sql .= " AND author LIKE ?";
            $params[] = "%$author_query%";
        }

        if (!empty($language)) {
            $sql .= " AND language = ?";
            $params[] = $language;
        }

        if (!empty($genre)) {
            $sql .= " AND genre = ?";
            $params[] = $genre;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   

 }


?>