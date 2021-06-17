<?php

    include "conn.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { //jika menggunakan method POST
    
        $namanya = $_POST['namanya'];
        echo $namanya;
    } else
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){ //jika menggunakan method GET
        $mhs = "select * from mahasiswa";
        $datamhs = mysqli_query($conn, $mhs);
        while ($data = mysqli_fetch_array($datamhs)) {
            // var_dump($data);
            $datanya[] = array(
                'npm' => $data['npm'],
                'nama' => $data['nama'],
                'jurusan' => $data['jurusan']
            );
        }
        
        $respon[] = array(
            'status' => 'OK',
            'kode' => '999',
            'data' => $datanya
        );
        header("Content-type: application/json");
        echo json_encode($respon);
    }

?>