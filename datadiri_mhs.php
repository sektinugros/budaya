<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "budaya";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function cleanInput($input)
{
    global $conn;
    return mysqli_real_escape_string($conn, $input);
}

$mahasiswaData = [];

$result = $conn->query("SELECT * FROM mahasiswa");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $mahasiswaData[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = cleanInput($_POST["nama"]);
    $nim = cleanInput($_POST["nim"]);

    if (!empty($nama) && !empty($nim)) {
        if (isset($_POST["edit_id"])) {
            // Jika edit_id diset, maka proses edit data
            $editId = cleanInput($_POST["edit_id"]);
            $stmt = $conn->prepare("UPDATE mahasiswa SET nama=?, nim=? WHERE id=?");
            $stmt->bind_param("ssi", $nama, $nim, $editId);
        } else {
            // Jika tidak, maka proses tambah data
            $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim) VALUES (?, ?)");
            $stmt->bind_param("ss", $nama, $nim);
        }

        $stmt->execute();
        $stmt->close();

        $result = $conn->query("SELECT * FROM mahasiswa");
        $mahasiswaData = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mahasiswaData[] = $row;
            }
        }
    }
}


function fetchDataFromDatabase($conn)
{
    $result = $conn->query("SELECT * FROM mahasiswa");
    $mahasiswaData = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $mahasiswaData[] = $row;
        }
    }

    return $mahasiswaData;
}

if (isset($_GET["delete_id"])) {
    $deleteId = cleanInput($_GET["delete_id"]);
    $conn->query("DELETE FROM mahasiswa WHERE id = $deleteId");

    $mahasiswaData = fetchDataFromDatabase($conn);
}

$editData = null;
if (isset($_GET["edit_id"])) {
    $editId = cleanInput($_GET["edit_id"]);
    $editResult = $conn->query("SELECT * FROM mahasiswa WHERE id = $editId");

    if ($editResult->num_rows > 0) {
        $editData = $editResult->fetch_assoc();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Diri Mahasiswa</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('img/batik3.jpg');
        }

        h1 {
            text-align: center;
            color: black;
            font-size: 2em;
            margin-top: 30px;
        }

        .container {
            width: 70%;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #3498db;
            color: white;
            border-radius: 5px 5px 0 0;
        }

        td:nth-child(even) {
            background-color: #95a5a6;
            color: white;
        }

        footer {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 1px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .form-container {
            display: none;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 30px auto;
            padding: 20px;
            width: 70%;
        }

        form label {
            display: block;
            margin-bottom: 8px;
        }

        form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        form .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form .btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">

        <center>
            <h1>Data Diri Kelompok 3</h1>
        </center>
        <button class="btn" onclick="showForm()">Tambah Mahasiswa</button>

        <table id="mahasiswaTable">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nim</th>
                <th>Action</th>
            </tr>

            <?php
            foreach ($mahasiswaData as $index => $mahasiswa) {
                echo "<tr>
                    <td>" . ($index + 1) . "</td>
                    <td>{$mahasiswa['nama']}</td>
                    <td>{$mahasiswa['nim']}</td>
                    <td>            
                    <button onclick=\"editMahasiswa({$mahasiswa['id']})\">Edit</button>
                    <button onclick=\"deleteMahasiswa({$mahasiswa['id']})\">Hapus</button></td>
                </tr>";
            }
            ?>
        </table>
        <div id="form-container" class="form-container">
            <?php if (isset($editData)): ?>
                <button class="btn" onclick="cancelEdit()">Selesai Edit</button>
            <?php endif; ?>
            <form method="post" id="mahasiswa-form">
                <h2>
                    <?php echo isset($editData) ? 'Form Edit Mahasiswa' : 'Form Tambah Mahasiswa'; ?>
                </h2>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required
                    value="<?php echo isset($editData) ? $editData['nama'] : ''; ?>">

                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required
                    value="<?php echo isset($editData) ? $editData['nim'] : ''; ?>">

                <?php if (isset($editData)): ?>
                    <input type="hidden" name="edit_id" value="<?php echo $editData['id']; ?>">
                    <button class="btn" type="submit">Simpan</button>
                <?php else: ?>
                    <button class="btn" type="submit">Tambah</button>
                <?php endif; ?>


            </form>
        </div>        
    </div>

    <script>
        window.onload = function () {
            const editData = <?php echo json_encode($editData); ?>;
            if (editData) {
                showForm();
                document.getElementById('nama').value = editData.nama;
                document.getElementById('nim').value = editData.nim;
            }
        }

        function showForm() {
            const formContainer = document.getElementById("form-container");
            formContainer.style.display = "block";
        }
        function editMahasiswa(id) {
            window.location.href = `?edit_id=${id}`;
        }

        function cancelEdit() {
            window.location.href = '?';
        }

        function deleteMahasiswa(id) {
            if (confirm("Apakah Anda yakin ingin menghapus mahasiswa ini?")) {
                window.location.href = `?delete_id=${id}`;
            }
        }
    </script>
    <center><button class="btn" onclick="window.location.href='index.html'">KLIK Untuk Kembali Ke Halaman Utama <br>
            <b>Budaya Indonesia</b> </button></center>

</body>

</html>