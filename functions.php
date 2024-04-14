<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "pegawai");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}



function tambah($data) {
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $email = htmlspecialchars($data["email"]);
    $jabatan = htmlspecialchars($data["jabatan"]);

    // upload gambar 
    $gambar = upload();
    if ( !$gambar ) {
        return false;
    }

     // query insert data
     $query = "INSERT INTO pegawai VALUES
     ('', '$nama', '$nik', '$jabatan', '$email', '$gambar')
     ";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
}


function upload() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    // if ( $error === 4 ) {
    //     echo 
    //         "<script>
    //             alert('Tidak ada gambar yang di upload');
    //         </script>";
    //     return false;
    // }

    // cek apakah yang di upload adalah gambar
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo 
            "<script>
                alert('Yang anda upload bukan gambar');
            </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ( $ukuranFile > 1000000 ) {
        echo 
            "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // lolos pengecekan gambar siap di upload
    // generate nama gambar baru 
    $namaFileBaru = uniqid();
    $namaFileBaru.= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}


function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pegawai WHERE id = $id");
    
    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $nik = htmlspecialchars($data["nik"]);
    $email = htmlspecialchars($data["email"]);
    $jabatan = htmlspecialchars($data["jabatan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if ( $_FILES['gambar']['error'] === 4 ){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

     // query update data
     $query = "UPDATE pegawai SET 
        nama = '$nama',
        nik = '$nik',
        email = '$email',
        jabatan = '$jabatan',
        gambar = '$gambar'
    WHERE id = $id
     ";
     mysqli_query($conn, $query);

     return mysqli_affected_rows($conn);
}

// function cari($keyword) {
//     $query = "SELECT * FROM 
//         pegawai WHERE 
//         nama LIKE '%$keyword%' OR 
//         nik LIKE '%$keyword%' OR 
//         email LIKE '%$keyword%' OR 
//         jabatan LIKE '%$keyword%'
//     ";
//     return query($query);
// }
function cari($keyword) {
	global $conn;

	$query = "SELECT * FROM pegawai
				WHERE
				nama LIKE '%$keyword%' OR
				nik LIKE '%$keyword%' OR
				email LIKE '%$keyword%' OR
				jabatan LIKE '%$keyword%'
			 ";

	$result = mysqli_query($conn, $query);

	$rows = [ ];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[ ] = $row;
	}

	return $rows;
}

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // username existed atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if ( mysqli_fetch_assoc($result) ) {
        echo 
            "<script>
                alert('Username sudah digunakan');
            </script>";
        return false;
    }

    // cek konfirmasi password
    if ( $password !== $password2 ) {
        echo 
            "<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";
        return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}


?>