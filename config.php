<?php
// Created By Fikrul Akhyar
// 25 April 2021

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);

$maintenance = 0; // Maintenance? 1 = ya 0 = tidak
if ($maintenance == 1) {
    die("Site under Maintenance.");
}

// database
$config['db'] = array(
    'host' => 'localhost',
    'name' => 'crud',
    'username' => 'root',
    'password' => ''
);

$conn = mysqli_connect($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['name']);
if (!$conn) {
    die("Koneksi Gagal : " . mysqli_connect_error());
}

// date & time
$date = date("d-m-Y");
$time = date("H:i:s");
