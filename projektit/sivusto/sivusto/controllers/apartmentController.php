<?php 
require_once "database/models/apartment.php";
require_once 'libraries/cleaners.php';

function viewApartmentController($id) {
    global $apartment;
    $apartment = getApartment($id);
    require "views/apartment.view.php";
}

?>