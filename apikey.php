<?php

function getKey() {                                 //fungsi memanggil data dengan kata kunci film, daftar film, listfilm
    return ["film", "daftarfilm", "listfilm"];
}

function isValid($input) {                          //fungsi validasi pemanggilan data dengan kata kunci
    $apikey = $input["api_key"];
    if (in_array($apikey, getKey())) {
        return true;
    } else {
        return false;
    }
}

function jsonOut($status, $message, $data) {         
    $respon = ["status" => $status, "message" => $message, "data" => $data];

    header("Content-type: application/json");
    echo json_encode($respon);
}

function getFilm() {                        //fungsi array data film
    $film = [
        ["title" => "FF9", "konten" => "film ini film ke-1"],
        ["title" => "Sweet and Sour", "konten" => "film ini film ke-2"],
        ["title" => "Recalled", "konten" => "film ini film ke-3"],
        ["title" => "The Conjuring 3", "konten" => "film ini film ke-4"]
    ];
    return $film;
}

if (isValid($_GET)) {                       //pemanggilan data film
    jsonOut("berhasil", "apikey valid!", getFilm());
} else {
    jsonOut("gagal", "apikey tidak valid!", null);
}

?>