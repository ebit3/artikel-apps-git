<?php

session_start();

// koneksi
function koneksi()
{
    # code...

    $conn = mysqli_connect('localhost', 'root', '', 'dbs_article') or die(mysqli_error($conn));

    return $conn;
}


// auth control


// login
function login($data)
{
    # code...

    $conn = koneksi();

    $user = $data['username'];
    $pass = $data['password'];

    $cek_username = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '" . $user . "' ");

    // cek username 
    if (mysqli_num_rows($cek_username) === 1) {

        $row = mysqli_fetch_assoc($cek_username);

        if (password_verify($pass, $row['password'])) {

            $_SESSION['status_admin_login'] = true;
            $_SESSION['profile'] = $row;
            header('location:../admin/index.php');
        } else {

            header("location:../auth/login.php");
            $_SESSION['status'] = true;
            $_SESSION['e_password'] = "Password anda salah";
        }
    } else {

        header("location:../auth/login.php");
        $_SESSION['status'] = true;
        $_SESSION['e_username'] = "Username anda salah";
    }

    return $cek_username;
}


// end auth control



// artikel control



// show artikel
function show_artikel($query)
{
    # code...

    $conn = koneksi();

    $query = mysqli_query($conn, $query);

    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {

        $data[] = $row;
    }

    return $data;
}


// add artikel
function add_artikel($data)
{
    # code...

    $conn = koneksi();

    $kategori   = htmlspecialchars(stripslashes($data['kategori']));
    $judul      = htmlspecialchars(stripslashes($data['judul']));

    // $isi = stripslashes($data['isi']);
    $isi = addslashes($data['isi']);

    $publisher  = $data['publish'];
    $status     = $data['status'];

    $gambar     = upload();

    if (!$gambar) {

        return false;
    }

    $sql = "INSERT INTO tb_artikel VALUES (NULL, '" . $kategori . "', '" . $judul . "', '" . $isi . "', '" . $publisher . "', '" . date('Y-m-d') . "', '" . $gambar . "', '" . $status . "')";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header('location:artikel.php');
        $_SESSION['status'] = true;
        $_SESSION['add_artikel'] = "Tambah data berhasil";
    } else {

        echo "<script>alert('Tambah Data Gagal');history.go(-1);</script>" . mysqli_error($conn);
    }

    return $cek;
}


// 
function upload()
{
    # code...

    $conn = koneksi();

    $nama_file = $_FILES['gambar']['name'];
    $tipe_file = $_FILES['gambar']['type'];
    $ukuran_file = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    // gambar kosong
    if ($error == 4) {

        // echo "<script>alert('Hapus Data Gagal');history.go(-1);</script>";

        return 'default.jpg';
    }


    // cek ekstensi file
    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));

    if (!in_array($ekstensi_file, $daftar_gambar)) {

        echo "<script>alert('ekstensi gambar salah');history.go(-1);</script>";

        return false;
    }


    // cek type file
    if ($tipe_file !== 'image/jpeg' && $tipe_file !== 'image/png') {

        echo "<script>alert('Gambar anda salah');history.go(-1);</script>";

        return false;
    }


    // cek ukuran file
    if ($ukuran_file >= 4000000) {

        echo "<script>alert('Ukuran terlalu besar');history.go(-1);</script>";

        return false;
    }

    // berhasil
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;

    move_uploaded_file($tmp_file, '../images/assets/' . $nama_file_baru);

    return $nama_file_baru;
}


// edit artikel
function edit_artikel($data)
{
    # code...

    $conn = koneksi();

    $artikel_id = $data['artikel_id'];
    $kategori   = $data['kategori'];
    $judul      = htmlspecialchars(stripslashes($data['judul']));
    $isi = addslashes($data['isi']);

    $publisher  = $data['publish'];
    $status     = $data['status'];

    $gambar_lama = $data['gambar_lama'];

    $gambar = upload();

    if (!$gambar) {

        return false;
    }

    if ($gambar == 'default.jpg') {

        $gambar = $gambar_lama;
    }

    $query = "UPDATE tb_artikel SET kategori = '" . $kategori . "', judul = '" . $judul . "', isi = '" . $isi . "',  publisher = '" . $publisher . "', tgl_release = '" . date('Y-m-d') . "', gambar = '" . $gambar . "', status = '" . $status . "' WHERE id_artikel = '" . $artikel_id . "' ";

    mysqli_query($conn, $query);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:artikel.php");
        $_SESSION['status'] = true;
        $_SESSION['edit_artikel'] = "Edit data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}


// edit
function show_edit_artikel($query)
{
    # code...

    $conn = koneksi();

    $sql = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($sql);

    return $data;
}




// delete artikel
function drop_artikel($id)
{
    # code...

    $conn = koneksi();

    // ambil query gambar 
    $result = mysqli_query($conn, "SELECT * FROM tb_artikel WHERE id_artikel = '" . $id . "' ");

    $ambil_gambar = mysqli_fetch_assoc($result);

    $gambar = $ambil_gambar['gambar'];

    unlink("../images/assets/" . $gambar);


    // query delete
    mysqli_query($conn, "DELETE FROM tb_artikel WHERE id_artikel = '" . $id . "' ");


    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:artikel.php");
        $_SESSION['status'] = true;
        $_SESSION['drop_artikel'] = "Hapus data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}


// end artikel control




// control kategori


// kategori tambah
function add_kategori($data)
{
    # code...

    $conn = koneksi();

    $kategori   = $data['kategori'];

    mysqli_query($conn, "INSERT INTO tb_kategori VALUES(NULL, '" . $kategori . "')");

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:kategori.php");
        $_SESSION['status'] = true;
        $_SESSION['add_kategori'] = "Tambah data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}


// show kategori
function show_kategori($query)
{
    # code...

    $conn = koneksi();

    $query = mysqli_query($conn, $query);

    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {

        $data[] = $row;
    }

    return $data;
}


// drop kategori 
function drop_kategori($id)
{
    # code...

    $conn = koneksi();

    $sql = "DELETE FROM tb_kategori WHERE id_kategori = '" . $id . "' ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:kategori.php");
        $_SESSION['status'] = true;
        $_SESSION['drop_kategori'] = "Hapus data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}


// edit
function show_edit_kategori($query)
{
    # code...

    $conn = koneksi();

    $sql = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($sql);

    return $row;
}


// edit kategori
function edit_kategori($data)
{
    # code...

    $conn = koneksi();

    $kategori_id = $data['kategori_id'];
    $kategori = $data['kategori'];

    $sql = "UPDATE tb_kategori SET kategori = '" . $kategori . "' WHERE id_kategori = '" . $kategori_id . "'  ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:kategori.php");
        $_SESSION['status'] = true;
        $_SESSION['edit_kategori'] = "Edit data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}


// end control kategori

// show user
function show_user($query)
{
    # code...

    $conn = koneksi();

    $query = mysqli_query($conn, $query);

    $data = [];

    while ($row = mysqli_fetch_assoc($query)) {

        $data[] = $row;
    }

    return $data;
}


// user tambah
function add_user($data)
{
    # code...

    $conn = koneksi();

    $nama           = stripslashes($data['nama']);
    $username       = stripslashes($data['username']);
    $password       = mysqli_real_escape_string($conn, $data['password']);
    $role           = $data['role'];
    $jurusan        = $data['jurusan'];
    $kelas        = $data['kelas'];

    // cek username
    $ambil = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '" . $username . "' ");

    if (mysqli_fetch_assoc($ambil) >   1) {

        echo "  
            <script>
                alert('Username Sudah Terdaftar');
                history.go(-1);
            </script>";

        return false;
    } else {

        $password = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "INSERT INTO tb_user VALUES(NULL, '" . $nama . "', '" . $username . "', '" . $password . "',  '" . $kelas . "', '" . $jurusan . "', '" . $role . "')");

        $cek = mysqli_affected_rows($conn);

        if ($cek > 0) {

            header("location:user.php");
            $_SESSION['status'] = true;
            $_SESSION['add_user'] = "Tambah data berhasil";
        } else {

            echo "gagal" . mysqli_error($conn);
        }

        return $cek;
    }
}


// edit show id user
function show_edit_user($query)
{
    # code...

    $conn = koneksi();

    $sql = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($sql);

    return $row;
}


// edit user
function edit_user($data)
{
    # code...

    $conn = koneksi();

    $user_id        = $data['user_id'];
    $nama           = stripslashes($data['nama']);
    $username       = stripslashes($data['username']);
    $password       = mysqli_real_escape_string($conn, $data['password']);
    $role           = $data['role'];
    $jurusan        = $data['jurusan'];
    $kelas          = $data['kelas'];

    if ($password !== "") {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE tb_user SET nama = '" . $nama . "', password = '" . $password . "', kelas = '" . $kelas . "', jurusan = '" . $jurusan . "' , role = '" . $role . "' WHERE id_user = '" . $user_id . "' ";

        mysqli_query($conn, $sql);


        $cek = mysqli_affected_rows($conn);

        if ($cek > 0) {

            header("location:user.php");
            $_SESSION['status'] = true;
            $_SESSION['edit_user'] = "Edit data berhasil";
        } else {

            echo "gagal" . mysqli_error($conn);
        }

        return $cek;
    } elseif ($username !== "") {

        // cek username
        $ambil = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '" . $username . "' ");

        if (mysqli_fetch_assoc($ambil) > 1) {

            echo "  
            <script>
                alert('Username Sudah Terdaftar');
                history.go(-1);
            </script>";

            return false;
        }

        $sql = "UPDATE tb_user SET nama = '" . $nama . "', username = '" . $username . "',  kelas = '" . $kelas . "', jurusan = '" . $jurusan . "' , role = '" . $role . "' WHERE id_user = '" . $user_id . "' ";

        mysqli_query($conn, $sql);

        $cek = mysqli_affected_rows($conn);

        if ($cek > 0) {

            header("location:user.php");
            $_SESSION['status'] = true;
            $_SESSION['edit_user'] = "Edit data berhasil";
        } else {

            echo "gagal" . mysqli_error($conn);
        }

        return $cek;
    } else {

        $sql = "UPDATE tb_user SET nama = '" . $nama . "', kelas = '" . $kelas . "', jurusan = '" . $jurusan . "' ,  role = '" . $role . "' WHERE id_user = '" . $user_id . "' ";

        mysqli_query($conn, $sql);

        $cek = mysqli_affected_rows($conn);

        if ($cek > 0) {

            header("location:user.php");
            $_SESSION['status'] = true;
            $_SESSION['edit_user'] = "Edit data berhasil";
        } else {

            echo "gagal" . mysqli_error($conn);
        }

        return $cek;
    }
}



// drop kategori 
function drop_user($id)
{
    # code...

    $conn = koneksi();

    $sql = "DELETE FROM tb_user WHERE id_user = '" . $id . "' ";

    mysqli_query($conn, $sql);

    $cek = mysqli_affected_rows($conn);

    if ($cek > 0) {

        header("location:user.php");
        $_SESSION['status'] = true;
        $_SESSION['drop_user'] = "Hapus data berhasil";
    } else {

        echo "gagal" . mysqli_error($conn);
    }

    return $cek;
}

// control user