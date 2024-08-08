<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Library Books Data</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- <script src="search.js"></script> -->
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Central Library</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="container mt-3">
      <form class="row g-3 align-items-center" id="searchForm" method="POST" action="?action=filterBooks">
        <!-- Search Title -->
        <div class="col-auto">
          <input type="text" name="title_query" id="titleInput" class="form-control" placeholder="Search Title" title="Enter title keyword" value="<?php echo isset($_POST['title_query']) ? htmlspecialchars($_POST['title_query']) : ''; ?>">
        </div>

        <!-- Search Author -->
        <div class="col-auto">
          <input type="text" name="author_query" id="authorInput" class="form-control" placeholder="Search Author" title="Enter author keyword" value="<?php echo isset($_POST['author_query']) ? htmlspecialchars($_POST['author_query']) : ''; ?>">
        </div>

        <!-- Language Dropdown -->
        <div class="col-auto">
          <select class="form-select" id="filterLanguage" name="language" aria-label="Default select example">
            <option value="">Language</option>
            <option value="English" <?php echo (isset($_POST['language']) && $_POST['language'] == 'English') ? 'selected' : ''; ?>>English</option>
            <option value="Hindi" <?php echo (isset($_POST['language']) && $_POST['language'] == 'Hindi') ? 'selected' : ''; ?>>Hindi</option>
            <option value="Marathi" <?php echo (isset($_POST['language']) && $_POST['language'] == 'Marathi') ? 'selected' : ''; ?>>Marathi</option>
          </select>
        </div>

        <!-- Genre Dropdown -->
        <div class="col-auto">
          <select class="form-select" id="filterGenre" name="genre" aria-label="Default select example">
            <option value="">Select Genre</option>
            <option value="Fiction" <?php echo (isset($_POST['genre']) && $_POST['genre'] == 'Fiction') ? 'selected' : ''; ?>>Fiction</option>
            <option value="Non-Fiction" <?php echo (isset($_POST['genre']) && $_POST['genre'] == 'Non-Fiction') ? 'selected' : ''; ?>>Non-Fiction</option>
            <option value="Other" <?php echo (isset($_POST['genre']) && $_POST['genre'] == 'Other') ? 'selected' : ''; ?>>Other</option>
          </select>
        </div>

        <!-- Search Button -->
        <div class="col-auto">
          <button type="submit" class="btn btn-primary" title="Search">
            <i class="bi bi-search"></i>
          </button>
        </div>
      </form>
    </div>
   

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <div class="row">
        <!-- User Profile Section -->
        <div class="card mt-4">
          <div class="card-body">
            <h5 class="card-title">User Profile</h5>
            <p class="card-text">
              <?php
              if (isset($_SESSION['user'])) {
                echo "<strong>Username:</strong> " . htmlspecialchars($_SESSION['user']['username']) . "<br>";
                echo "<strong>Email:</strong> " . htmlspecialchars($_SESSION['user']['email']) . "<br>";
                echo "<strong>Name:</strong> " . htmlspecialchars($_SESSION['user']['name']) . "<br>";
              } else {
                echo "No user is logged in.";
              }
              ?>
            </p>
          </div>
        </div>

        <li class="nav-item">
          <a class="nav-link collapsed" href="?action=book">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->



        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Books Forms</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="?action=bookForm">
                <i class="bi bi-circle"></i><span>Add New Book</span>
              </a>
            </li>

          </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
          <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

            <li>
              <a href="#" class="active">
                <i class="bi bi-circle"></i><span>Library Books Record</span>
              </a>
            </li>
          </ul>
        </li><!-- End Tables Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="?action=logout">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
          </a>
        </li>

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>

    </div>
    </nav>

    </div><!-- End Page Title -->

    <section class="section" id="my">

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Books Table</h5>
              <p>All Library book Records data.</p>

              <!-- Table with stripped rows -->
              <table class="table datatable" id="myTable">
                <thead>
                  <tr>
                    <th>Index</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Language</th>
                    <th>Description</th>
                    <th>Genre</th>
                    <th>Operation</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($books)) : ?>
                    <?php foreach ($books as $row) : ?>
                      <tr>
                        <td><?php echo htmlspecialchars($row["id"]); ?></td>
                        <td><?php echo htmlspecialchars($row["title"]); ?></td>
                        <td><?php echo htmlspecialchars($row["author"]); ?></td>
                        <td><?php echo htmlspecialchars($row["price"]); ?></td>
                        <td><?php echo htmlspecialchars($row["stock"]); ?></td>
                        <td><?php echo htmlspecialchars($row["language"]); ?></td>
                        <td><?php echo htmlspecialchars($row["description"]); ?></td>
                        <td><?php echo htmlspecialchars($row["genre"]); ?></td>
                        <td>
                          <a href='?action=editBookForm&id=<?php echo htmlspecialchars($row["id"]); ?>' class='btn btn-warning btn-sm'>Update</a>
                        </td>
                        <td>
                          <a href='?action=deleteBook&id=<?php echo htmlspecialchars($row["id"]); ?>' class='btn btn-danger btn-sm' onclick='return confirm("Are you sure you want to delete this record?")'>Delete</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <tr>
                      <td colspan="10">No results</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Company</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="pagination.js"></script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('#searchForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
          type: 'POST',
          url: 'index.php?action=filterBooks',
          data: $(this).serialize(),
          success: function(response) {
            $('#myTable tbody').html(response);
          }
        });
      });
    });
  </script>
</body>

</html>