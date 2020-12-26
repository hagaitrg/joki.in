<?php

class logic
{

    var $host = "localhost";
    var $username = "root";
    var $pwd = "";
    var $db = "wad";
    var $konek = "";

    function __construct()
    {
        $this->konek = mysqli_connect($this->host, $this->username, $this->pwd, $this->db);
        if (mysqli_connect_error()) {
            echo "Koneksi DB gagl : " . mysqli_connect_error();
        }
    }

    public function registrasi($data)
    {
        $username  =  strtolower(stripslashes($data['username']));
        $email = $data['email'];
        $level = $data['level'];
        $pwd = mysqli_real_escape_string($this->konek, $data['password']);
        $pwd2 = mysqli_real_escape_string($this->konek, $data['password2']);

        // cek username sudah pernah di buat?
        $cek = mysqli_query($this->konek, "select username from users where username = '$username'");
        if (mysqli_fetch_assoc($cek)) {
            echo
                "
                <script> 
                    alert('Username telah terdaftar');
                </script>
            ";
            return false;
        }

        // cek password
        if ($pwd != $pwd2) {
            echo
                "
                <script> 
                    alert('Konfirmasi tidak sesuai');
                </script>
            ";

            return false;
        }

        // enkripsi password
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);

        //INSERT KE DATABASE
        mysqli_query($this->konek, "insert into users 
        values('','$username','$email','$pwd','$level')");

        return mysqli_affected_rows($this->konek);
    }

    public function create($data)
    {
        $email = $data['email'];
        $hp = $data['hp'];
        $paket = $data['paket'];
        $durasi = $data['durasi'];
        $spek = $data['spek'];

        mysqli_query($this->konek, "insert into pesanan 
        values('','$email','$hp','$paket','$durasi','$spek','')");

        return mysqli_affected_rows($this->konek);
    }

    public function read_pesanan()
    {
        $data = mysqli_query($this->konek, "select * from pesanan");
        while ($row = mysqli_fetch_array($data)) {
            $result[] = $row;
        }

        if (mysqli_num_rows($data) > 0) {
            return $result;
        }
    }

    public function get_id($id)
    {
        $query  = mysqli_query($this->konek, "select * from
        pesanan where id ='$id'");

        return $query->fetch_array();
    }

    public function edit($id, $status)
    {
        mysqli_query($this->konek, "update pesanan set status='$status' where id = '$id'");
        return mysqli_affected_rows($this->konek);
    }

    public function delete($id)
    {
        mysqli_query($this->konek, "delete from pesanan where id='$id'");
        return mysqli_affected_rows($this->konek);
    }
}
