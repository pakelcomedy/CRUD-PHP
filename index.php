<?php
require ('koneksi.php');
require ('query.php');

// Periksa apakah 'user_fullname' ada di $_GET
$email = isset($_GET['user_fullname']) ? $_GET['user_fullname'] : 'Guest';
$obj = new crud($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <h1>Selamat Datang <?php echo $email; ?></h1>
    <table border='1'>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <td></td>
        </tr>
<?php
$data = $obj->lihatData();
$no = 1;
if(mysqli_num_rows($data) > 0){
    while ($row = mysqli_fetch_assoc($data)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['user_email']; ?></td>
            <td><?php echo $row['user_fullname']; ?></td>
            <td><a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="hapus.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php
    }
}
?>
    </table>
</body>
</html>
