<?php
require_once('contactfunct.php');
session_start();
if (empty($_SESSION["name"])) {
  header('location:login.php');
}
$contact = new contact();
$contact->SetId($_SESSION['id']);
$res = $contact->Select();
if (isset($_POST['save'])) {
  $contact->SetName($_POST['name']);
  $contact->SetPhone($_POST['phone']);
  $contact->SetEmail($_POST['email']);
  $contact->SetAddress($_POST['address']);
  $contact->SetId($_SESSION['id']);

  if ($contact->Add()) {
    header("Location:contactlist.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
  <nav class="container-fluid navbar navbar-light bg-black justify-content-between bg-opacity-75 px-3 w-100">
    <h1 class="title text-white ">contact list</h1>
    <div>
      <a class="text-white mx-2 text-decoration-none" href="profil.php"><?php echo $_SESSION['name'] ?></a>
      <a class="text-white mx-2 text-decoration-none" href="contactlist.php">contacts</a>
      <a class="text-white mx-2 text-decoration-none" href="delete_update.php?&req=logout">Logout</a>
    </div>

  </nav>
  <div class="container d-flex justify-content-end mt-4">
    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><button class="btn btn-secondary text-white shadow ">ADD NEW CONTACT</button></a>
    <!-- Modal add-->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New contact Form</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="px-4 py-3 " id="form">
            <form method="POST" class="text-muted row g-3 needs-validation">
              <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="small-size form-control" name="name" id="name" placeholder="Enter name" required>
              </div>
              <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="small-size form-control" name="phone" id="phone" placeholder="Enter phone">
              </div>
              <div class="col-md-12">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="small-size form-control" name="email" id="email" placeholder="Enter email" required>
              </div>
              <div class="col-md-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="small-size form-control" name="address" id="address" placeholder="Enter address" required>
              </div>
              <div class="col-12 mt-3 modal-footer text-center">
                <button class="btn btn-primary" name="save" type="submit">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div style="margin: 100px; overflow-x: auto;">
    <h4>Contacts List:</h4>
    <div class="py-4">
      <div class=" px-3">
        <?php if (!empty($res)) {
          foreach ($res as $rows) { ?>
            <hr class="my-0">
            <div class="row my-3 item  bg-light">
              <p style="display: none;" class="contact_id"><?= $rows['id_contact'] ?></p>
              <p class="col-sm-2 mb-0 p-1"><?= $rows['name']; ?></p>
              <p class="col-sm-3 mb-0 p-1"><?= $rows['email']; ?></p>
              <p class="col-sm-2 mb-0 p-1"><?= $rows['phone']; ?></p>
              <p class="col-sm-3 mb-0 p-1"><?= $rows['address']; ?></p>
              <p class="col-sm-1 mb-0 p-1"><a class="text-decoration-none btn-edit" type="button" data-bs-toggle="modal" data-bs-target="#exampleModaledit">Edit</a></p>
              <p class="col-sm-1 mb-0 p-1">
                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModaldelete" class="text-decoration-none">Delete</a>
              </p>
            </div>
        <?php }
        } else {
          echo "<div><p>No Contacts.</p></div>";
        }; ?>
      </div>
    </div>
  </div>

  <!-- Modal delete -->
  <div class="modal fade" id="exampleModaldelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger" id="exampleModalLabel">DELETE CONTACT ALERT</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="px-4 py-3">
          Do you really want to delete this contact? <br>
        </div>
        <div class="px-4 py-3">
          <a class="text-decoration-none text-info" href="delete_update.php?id=<?= $rows['id_contact'] ?>&req=delete">Yes, Delete this contact please</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal edit -->
  <div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit contact Form</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="px-4 py-3" id="form">
          <form method="POST" action="delete_update.php" class="text-muted row g-3 needs-validation" novalidate>
            <input type="hidden" name='id' class="id">
            <div class="col-md-6">
              <label for="name" class="form-label">Name</label>
              <input type="text" pattern="^[a-zA-Z]{3,20}$" class="name small-size form-control" name="name" value="" required>
              <div class="invalid-feedback">
                Please choose a username.
              </div>
            </div>
            <div class="col-md-6">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="phone small-size form-control" name="phone" value="" placeholder="Enter phone">
            </div>
            <div class="col-md-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="email small-size form-control" name="email" value="" required>
              <div class="invalid-feedback">
                Please choose an email.
              </div>
            </div>

            <div class="col-md-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="adress small-size form-control" name="address" value="" required>
              <div class="invalid-feedback">
                Please choose an address.
              </div>
            </div>

            <div class="col-12 mt-3 modal-footer text-center">
              <input type="hidden" name='req' value='update'>
              <input type="submit" value='Update Contact' class="btn btn-primary"></input>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script src="update.js"></script>

</body>

</html>