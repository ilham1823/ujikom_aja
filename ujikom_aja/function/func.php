<?php

function getUserRole($conn, $username) {
    $userRole = '';  // Default value

    $query = "SELECT role FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $userRole = $row['role'];
    }

    return $userRole;
}

function checkAdminRole($role) {
    if ($role !== "admin") {
        header("Location: blocked.php");
        exit();
    }
}

function dataBuku($role){
    if ($role == "admin" || $role == "petugas") {
    } else {
        header("Location: blocked.php");
        exit();

    }
}

function checkPetugasRole($role) {
    if ($role !== "petugas") {
        header("Location: blocked.php");
        exit();
    }
}

function checkUserRole($role) {
    if ($role !== "peminjam") {
        header("Location: blocked.php");
        exit();
    }
}


function getLoggedInUserID($conn, $username) {
    $query = "SELECT id FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    $userId = $row['id'];

    return $userId;
}