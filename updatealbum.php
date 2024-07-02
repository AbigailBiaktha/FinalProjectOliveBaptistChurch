<?php
session_start();
require_once('logic/connect.php');
if (!isset($_SESSION['admin_id'])) {
  header('Location: login.php');
  exit();
}


if (!isset($_GET['id'])) {
    die("Album ID not specified.");
}

$album_id = $_GET['id'];

// Fetch album details
$sql = "SELECT * FROM albums WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $album_id);
$stmt->execute();
$album_result = $stmt->get_result();
$album = $album_result->fetch_assoc();

// Fetch existing photos
$photos_sql = "SELECT * FROM album_photos WHERE album_id = ?";
$photos_stmt = $conn->prepare($photos_sql);
$photos_stmt->bind_param("i", $album_id);
$photos_stmt->execute();
$photos_result = $photos_stmt->get_result();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <style>
    .photo-grid {
      display: flex;
      flex-wrap: wrap;
    }
    .photo-grid-item {
      flex: 1 0 21%;
      margin: 5px;
    }
    .photo-grid-item img {
      width: 100%;
      height: auto;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <div class="logo">
        <span class="logo-mini"><b>G</b>P</span>
        <span class="logo-lg"><b>G</b>-Path</span>
      </div>
      <nav class="navbar navbar-static-top" role="navigation">
      </nav>
    </header>

    <aside class="main-sidebar">
      <section class="sidebar">
        <ul class="sidebar-menu">
          <?php include_once('navigation.php'); ?>
        </ul>
      </section>
    </aside>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          <small>Welcome Administrator!</small>
        </h1>
      </section>

      <section class="content">

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Update Album</h3>
            <form method="post" action="logic/album/updatealbum.php" enctype="multipart/form-data">
              <table class="table">
                <tbody>
                  <tr>
                    <td><label for="title">Title</label></td>
                    <td><input type="text" name="title" value="<?php echo htmlspecialchars($album['title']); ?>" required></td>
                  </tr>
                  <tr>
                    <td><label for="description">Description</label></td>
                    <td><textarea name="description" required><?php echo htmlspecialchars($album['description']); ?></textarea></td>
                  </tr>
                  <tr>
                    <td><label for="cover_image">Cover Image</label></td>
                    <td><input type="file" name="cover_image"></td>
                  </tr>
                  <input type="hidden" name="id" value="<?php echo $album['id']; ?>">
                  <tr>
                    <td></td>
                    <td>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>
          </div>
        </div>

        <!-- Add Photos Section -->
       <!-- Add Photos Section -->
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Add Photos</h3>

        <form method="post" action="logic/photo/createphoto.php" enctype="multipart/form-data">
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="album_id">Album</label></td>
                        <td>
                            <select name="album_id" class="form-control" required>
                                <option value="<?php echo $album['id']; ?>"><?php echo htmlspecialchars($album['title']); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="photo_url">Photos</label></td>
                        <td>
                            <input type="file" name="photo_url[]" multiple="multiple" class="form-control" accept="image/*" required>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" name="addPhotos" class="btn btn-primary">Add</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<!-- Photo List Section -->
<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title">Photo List</h3>
    <div class="photo-grid">
      <?php while ($photo = $photos_result->fetch_assoc()) { ?>
        <div class="photo-grid-item">
          <img src="<?php echo htmlspecialchars($photo['photo_url']); ?>" alt="Photo">
          <div>
            <a href="logic/photo/deletephoto.php?id=<?php echo $photo['id'] ?>" onclick="return confirm('Are you sure you want to delete this photo?')">
              <button class="btn btn-danger btn-sm">Delete</button>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>


        <script>
          function confirmDelete() {
            var confirmDelete = confirm("Are you sure you want to delete this photo?");
            if (confirmDelete) {
              // Handle deletion
            } else {
              // If the user clicks "Cancel" in the confirmation dialog, do nothing (or handle it as needed)
            }
          }
        </script>
</body>

</html>
