<?php
require ('koneksi.php');

class crud {
    private $koneksi;

    public function __construct($koneksi) {
        $this->koneksi = $koneksi;
    }

    public function lihatData() {
        $sql = "SELECT * FROM user_detail";
        $result = mysqli_query($this->koneksi, $sql);
        return $result;
    }

    public function insertData($email, $pass, $name) {
        try {
            $sql = "INSERT INTO user_detail (user_email, user_pass, user_fullname) VALUES ('$email', '$pass', '$name')";
            $result = mysqli_query($this->koneksi, $sql);
            return $result;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>
