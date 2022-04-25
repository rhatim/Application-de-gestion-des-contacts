<?php
require_once('contactfunct.php');

session_start();

if (isset($_GET['req']) AND $_GET['req']== 'delete') {
        try {
            if (isset($_GET['id'])) {
                $contact = new contact();
                $contact->SetIdContact($_GET['id']);

                    if ($contact->Delete()) header("Location:contactlist.php");
                
            }
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }


if ( isset($_GET['req']) AND $_GET['req'] == 'logout') {
    session_destroy();
    header("Location: login.php");
}


if (isset($_POST['req']) AND $_POST['req'] == 'update') {
    $contact = new contact();
    $contact->SetIdContact($_POST['id']);
    $rows = $contact->SelectOne();
    $contact->SetName($_POST['name']);
    $contact->SetEmail($_POST['email']);
    $contact->SetPhone($_POST['phone']);
    $contact->SetAddress($_POST['address']);
    $resultats=$contact->update();
    if ($resultats) header("Location:contactlist.php");
}
?>