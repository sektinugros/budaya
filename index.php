<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $namaLengkap = $_POST["fullname"];
    $email = $_POST["email"];
    $nomorTelepon = $_POST["phone"];
    $pesan = $_POST["pesan"];

    // Query SQL untuk menyimpan data ke dalam tabel
    $sql = "INSERT INTO pesan_pengunjung_baru (nama_lengkap, email, nomor_telepon, pesan) VALUES ('$namaLengkap', '$email', '$nomorTelepon', '$pesan')";

    // Eksekusi query
    if ($koneksi->query($sql) === TRUE) {
        echo '<script>alert("Terima kasih atas masukkan Anda!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budaya Indonesia</title>
    <link rel="icon" href="img/favicon.png" type="image/png">
<style>
    body {
        background: url("img/batikimages.jpg") no-repeat center center fixed;
        background-size: cover;
    }

    .container {
        width: 960px;
        margin: auto;
        background-color: white;
        margin-top: 50px;
        border-radius: 50px;
        margin-bottom: 50px;
    }

    .header {
        padding: 20px;
        text-align: center;
        font-family: arial;
    } 
    }
    .header .judul {
        font-size: 30px;
        font-weight: bold;
    }

    .header ul li {
        display: inline-block;
        margin-top: 20px;
        margin-left: 5px;
    }

    .header a {
        text-decoration: none;
        color: salmon;
        padding: 3px;
    }

    .header a:hover {
        background-color: #0099cc;
        color: black;
        border-radius: 50px;
        text-transform: uppercase;
    }

    #banner {
        text-align: center;
        padding: 10px;
    }

    #isi {
        padding-left: 100px;
        border: 2px solid;
        font-family: arial;
        font-size: 15px;
        line-height: 1.3;
    }

    button:hover {
        box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        border-radius: 50px;
        text-transform: uppercase;
        background: #0099cc;
    }

    .button1,
    .button2 {
        border-radius: 10px;
    }

    .button1 {
        float: left;
        color: whitesmoke;
    }

    .button2 {
        float: right;
    }

    button {
        background-color: #0099cc;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }

    .body {
        margin-right: 5px;
        font-family: Arial;
        padding-right: 50px;
        padding-left: 50px;
        text-align: justify;
    }

    a {
        text-decoration: none;
        color: black;
    }

    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #0099cc;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #0099cc;
    }

    .form {
        padding: 20px;
        margin-left: 200px;
        margin-right: 200px;
        border-radius: 20px;
        background-color: #f2f2f2;
    }

    .form label,
    .form textarea,
    .form input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form textarea {
        height: 100px;
        resize: vertical;
    }

    .form input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: auto;
    }

    .form input[type=submit]:hover {
        background-color: #45a049;
    }

    font {
        text-align: center;
    }

    .ol {
        font-size: 15px;
        font-weight: 12;
    }

    #budaya {
        margin-left: 50px;
        margin-right: 50px;
        text-align: justify;
        font-family: Arial, Helvetica, sans-serif;
        text-indent: 50px;
        line-height: 1.5;
    }

    .bag1 {
        text-indent: 50px;
        line-height: 1.5;
    }

    .bag2 {
        line-height: 1.5;
    }

    h4 {
        text-decoration: none;
    }

    .footer {
        background-color: #0099cc;
        color: #ffffff;
        text-align: center;
        font-size: 16px;
        padding: 1px;
        margin-top: 50px;
        border-radius: 50px;
        clear: both;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

    .footer a {
        color: #ffffff;
        text-decoration: none;
    }

    .footer a:hover {
        text-decoration: underline;
    }
    .footer2 ul {
            list-style: none;
            padding: 0;
        }

        .footer2 ul li {
            display: inline-block;
            margin-left: 20px;
        }

        .footer2 a {
            text-decoration: none;
            color: white;
            padding: 3px;
        }

        .footer2 a:hover {
            background-color: #fff;
            color: #333;
            border-radius: 50px;
        }
</style>
<script>
    function tampilkanPopup() {
        alert("Formulir berhasil disubmit!");
    }
</script>
</head>
<body>
    <div class="container">

        <div class="header">
            <div id="header">
                <h1><b>Keberagaman Budaya Bangsa dan Negara Indonesia</b></h1>
            </div>
            <ul>
                <li><a href="index.php">Halaman Utama</a></li>
                <li><a href="budaya sunda.php">Budaya Sunda</a></li>
                <li><a href="budaya jawa.php">Budaya Jawa</a></li>
                <li><a href="datadiri_mhs.php">Informasi Kelompok</a></li>

            </ul>
        </div>


        <div id="banner">
            <img src="img/1 (4).jpg" alt="budaya Indonesia">
        </div>
        <div id="budaya">
            <p>Keberagaman budaya Indonesia memiliki kekayaan warisan budaya yang melimpah. Wilayah yang meliputi
                banyak pulau dari Sabang hingga Merauke menciptakan keragaman budaya yang berasal dari berbagai suku
                bangsa. Berdasarkan sensus Badan Pusat Statistik pada tahun 2010, terdapat lebih dari 300 kelompok
                etnis atau 1.340 kelompok suku bangsa yang ada di Indonesia.</p>
            <p>Keragaman ini menjadi inspirasi dari semboyan Bhineka Tunggal Ika, yang berarti meskipun berbeda-beda
                namun tetap satu. Walaupun terdapat berbagai macam suku, budaya, agama, dan golongan, namun
                Indonesia tetap bersatu sebagai satu kesatuan. Semboyan tersebut menegaskan bahwa keberagaman yang
                ada di negara kita merupakan sebuah kekayaan dan keindahan yang unik, yang tidak dimiliki oleh
                negara lain.</p>

        </div>
        <div id="isi">
            <h3>Daftar Isi : </h3>

            <ol type="A">
                <li><b>Pengertian Keberagaman Budaya</b></li>
                <li><b>Keberagaman Budaya Bangsa dan Negara Indonesia</b></li>
                <ol type="a"> <i>
                        <li><a href="#rumah adat">Keberagaman Budaya Rumah Adat Tradisional</a></li>
                        <li><a href="#upacara adat">Keberagaman Budaya Upacara Adat</a></li>
                        <li><a href="#pakaian adat">Keberagaman Budaya Pakaian Adat Tradisional</a></li>
                        <li><a href="#tarian adat">Keberagaman Budaya Tarian Adat Tradisional</a></li>
                        <li><a href="#senjata">Keberagaman Budaya Senjata Tradisional</a></li>
                        <li><a href="#alat musik">Keberagaman Budaya Alat Musik dan Lagu Tradisional</a></li>
                        <li><a href="#makanan khas">Keberagaman Budaya Makanan Khas</a></li>
                        <ul>
                            <li><a href="#sumatra">Makanan Khas Sumatera</a></li>
                            <li><a href="#jawa">Makanan Khas Jawa</a></li>
                            <li><a href="#bali">Makanan Khas Bali</a></li>
                            <li><a href="#kalimantan">Makanan Khas Kalimantan</a></li>
                            <li><a href="#papua">Makanan Khas Papua</a></li>
                        </ul>
                    </i></ol>
                <li><b>Kesimpulan</b></li>
            </ol>

        </div>
        <div class="body">

            <p><b>
                    <h2>Keberagaman Budaya Indonesia</h2>
                </b></p>
            <ol class="ol" type="A">
                <div>
                    <li>
                        <h4>
                            <p><b>Pengertian Keberagaman Budaya</b></p>
                        </h4>
                        <p class="bag1">Keberagaman budaya adalah salah satu ciri khas yang ada di dunia, dengan
                            berbagai suku bangsa yang tersebar di seluruh dunia, termasuk di Indonesia. Sebagai
                            warga negara Indonesia, kita tidak bisa mengabaikan fakta bahwa negara Indonesia
                            memiliki keragaman yang sangat besar, dari ras, suku bangsa, hingga bahasa.</p>
                        <p class="bag1">Keragaman ini telah melahirkan budaya Indonesia yang sangat kaya dan unik,
                            seperti rumah adat, upacara adat, pakaian adat tradisional, tarian adat tradisional,
                            alat musik dan lagu tradisional, senjata tradisional, dan berbagai makanan khas.</p>
                        <p class="bag1">Keragaman budaya Indonesia berasal dari kebudayaan lokal yang terus tumbuh
                            dan berkembang di masyarakat. Pengaruh dari berbagai kebudayaan tampak jelas dan
                            berdampak pada masyarakat sehingga menciptakan kebudayaan itu sendiri.</p>
                        <p class="bag1">Seiring berjalannya waktu, perkembangan kebudayaan memiliki peran dan fungsi
                            untuk meningkatkan semangat nasionalis. Hal ini disebabkan karena budaya lokal membawa
                            nilai-nilai sosial yang perlu diterapkan oleh masyarakat Indonesia secara luas.</p>
                    </li>
                </div>
                <li>
                    <p>
                    <h4><b>Keberagaman Budaya Bangsa dan Negara Indonesia</b></h4>
                    </p>
                    <p>Berikut ini merupakan keberagaman budaya yang ada pada bangsa dan negara Indonesia:</p>
                    <ol>
                        <div>
                            <li>
                                <p><a name="rumah adat"><b>Keberagaman Budaya Rumah Adat Tradisional</b></a></p>
                            </li>
                            <p class="bag1">Rumah adat tradisional merupakan sebuah bangunan atau konstruksi yang
                                dibangun dan dirancang dengan cara yang sama dari generasi ke generasi tanpa
                                perubahan yang signifikan. Meskipun telah lama berdiri, rumah adat masih
                                dipertahankan hingga saat ini dengan segala kegunaan, fungsi sosial, dan nilai
                                budaya yang terkandung di dalam desain dan corak bangunannya. Di setiap daerah,
                                rumah adat memiliki nama yang berbeda.</p>
                            <p><i>Contoh keberagaman rumah adat tradisional:</i></p>
                            <table>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>Rumah adat aceh</li>
                                            <li>Rumah Adat Bolon Sumatera Utara</li>
                                            <li>Rumah Adat Gadang Sumatera Barat</li>
                                            <li>Rumah Adat Melayu Selaso Jatuh Kembar Kepulauan Riau dan Riau</li>
                                            <li>Rumah Adat Panggung Jambi</li>
                                            <li>Rumah Adat Bubungan Lima Bengkulu</li>
                                            <li>Rumah Adat Limas Sumatera Selatan</li>
                                        </ul>
                                    </td>
                                    <td><img src="img/649c0a138b9ca.png" alt="rumah adat" width="300px"
                                            height="200px"></td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <li>
                                <p><a name="upacara adat"><b>Keberagaman Budaya Upacara Adat</b></a></p>
                            </li>
                            <p class="bag1">Upacara adat merupakan salah satu bentuk kebiasaan atau adat istiadat
                                dari masyarakat tradisional yang masih memiliki nilai-nilai yang relevan bagi
                                kehidupan dan kebutuhan mereka. Upacara adat dianggap sebagai warisan nenek moyang
                                yang dijaga dan dilestarikan secara turun-temurun di setiap daerah. Walaupun zaman
                                semakin modern, sebagian masyarakat tidak melupakan upacara adat karena memiliki
                                nilai filosofis dan kekuatan yang kuat bagi mereka.</p>
                            <p><i>Contoh keberagaman upacara adat:</i></p>
                            <ul class="bag2">
                                <li>Upacara adat besale Jambi</li>
                                <li>Upacara adat Perang ketupat Kepulauan Bangka Belitung</li>
                                <li>Upacara adat Bakar gunung api Bengkulu</li>
                                <li>Upacara adat Ngebabali Lampung</li>
                                <li>Upacara adat Sisingaan dari Jawa Barat, Jawa Timur dan Jawa Tengah</li>
                                <li>
                                    Upacara adat Seren Raun dari Banten, Yogyakarta, dan Bali
                                </li>
                            </ul>
                        </div>

                        <div>
                            <li>
                                <p><a name="pakaian adat"><b>Keberagaman Budaya Pakaian Adat Tradisional</b></a></p>
                            </li>
                            <p class="bag1">Pakaian adat tradisional adalah salah satu simbol identitas dari suatu
                                suku. Cara utama untuk mengenali suatu suku adalah dengan melihat pakaian
                                tradisional adatnya, selain melihat dari bentuk rumah adatnya. Biasanya, pakaian
                                adat dipakai ketika upacara adat sedang berlangsung.</p>
                            <p class="bag1">Namun, seiring dengan perkembangan zaman, pakaian adat telah menjadi
                                tren dalam dunia fashion. Banyak orang yang memodifikasi pakaian adat agar terlihat
                                modern dan fashionable, sehingga dapat dipakai pada acara informal dan dipadukan
                                dengan pakaian modern.</p>
                            <p><i>Contoh keberagaman pakaian adat tradisional:</i></p>
                            <ul class="bag2">
                                <li>Pakaian Adat Kebaya Labuh dan Teluk Belanga Kepulauan Riau</li>
                                <li>Pakaian Adat Bundo Kanduang, Limpapeh Rumah Nan Gadang Sumatera Barat</li>
                                <li>Pakaian Adat Aesan Gede Sumatera Selatan</li>
                                <li>Pakaian Adat Paksian Bangka Belitung</li>
                                <li>Pakaian Adat King Baba atau King Tompang Kalimantan Barat</li>
                                <li>Pakaian Adat Manteren Lamo dan Kimun Gia Maluku Utara</li>
                            </ul>
                        </div>


                        <div>
                            <li>
                                <p><a name="tarian adat"><b>Keberagaman Budaya Tarian Adat Tradisional</b></a></p>
                            </li>
                            <p class="bag1">Tarian adat sering diadakan sebagai bagian dari serangkaian upacara
                                adat. Tarian adat tradisional biasanya memiliki ciri khas yang merefleksikan budaya
                                dan kearifan lokal. Tarian adat tradisional menjadi salah satu contoh dari keragaman
                                budaya Indonesia yang terkenal dan sering dipertunjukkan pada acara penting di
                                tingkat internasional.</p>

                        </div>
                        <div>
                            <li>
                                <p><a name="senjata"><b>Keberagaman Budaya Senjata Tradisional</b></a></p>
                            </li>
                            <p class="bag1">Senjata tradisional adalah hasil dari kebudayaan suatu masyarakat yang
                                erat kaitannya dengan wilayah setempat. Senjata tradisional berfungsi untuk
                                melindungi dari serangan musuh, serta dalam aktivitas berburu dan bertani. Seiring
                                berjalannya waktu, senjata tradisional menjadi simbol identitas suatu bangsa dan
                                menjadi aset kebudayaan Indonesia.</p>
                            <p class="bag1">Setiap provinsi di Indonesia memiliki senjata tradisional yang berbeda,
                                memiliki nilai dan aturan yang sejalan dengan norma budaya setempat.</p>
                            <p><i>Contoh keberagaman senjata tradisional:</i></p>
                            <ul class="bag2">
                                <li>Keris berasal dari Jawa</li>
                                <li>Kawali atau Badik dari Sulawesi</li>
                                <li>Mandau dari Kalimantan</li>
                                <li>Celurit dari Madura (Jawa Timur)</li>
                                <li>Parang Salawaku dari Maluku</li>
                            </ul>
                        </div>

                        <div>

                            <li>
                                <p><a name="alat musik"><b>Keberagaman Budaya Alat Musik dan Lagu
                                            Tradisional</b></a></p>
                            </li>
                            <p class="bag1">Indonesia memiliki beragam alat musik tradisional yang khas dan unik.
                                Beberapa di antaranya telah dikenal hingga ke ranah internasional. Bagi masyarakat
                                adat, alat musik tradisional memiliki tiga fungsi utama, yaitu sebagai media atau
                                sarana dalam upacara adat, sebagai pengisi latar musik pada pertunjukan seni, dan
                                sebagai sarana ekspresi, kreativitas, bahkan komunikasi.</p>
                            <p><i>Contoh keberagaman alat musik dan lagu tradisional:</i></p>
                            <ul class="bag2">
                                <li>Alat musik Angklung dari Jawab Barat</li>
                                <li>Alat musik Gamelan dari Jawa, Sunda, Bali, dan Lombok</li>
                                <li>Alat musik Tifa dari Maluku dan Papua</li>
                                <li>Alat musik Kolintang dari Sulawesi Utara</li>
                            </ul>
                        </div>


                        <div>
                            <li>
                                <p><a name="makanan khas"><b>Keberagaman Budaya Makanan Khas</b></a></p>
                            </li>
                            <p class="bag1">Sebagai negara kepulauan dengan tanahnya yang subur dan dapat
                                menumbuhkan berbagai jenis tanaman, Indonesia menjadi kaya akan rempah-rempah. Hal
                                ini memungkinkan Indonesia untuk menciptakan makanan khas dengan cita rasa
                                rempah-rempah yang khas dan melekat pada setiap hidangannya. Oleh karena itu,
                                Indonesia menjadi salah satu negara dengan wisata kuliner yang sangat dihargai oleh
                                masyarakat internasional.</p>
                            <p><i>Beberapa makanan khas daerah di Indonesia yang cukup terkenal, antara lain:</i>
                            </p>
                            <ol>
                                <li><b>
                                        <a name="sumatra">Makanan Khas Sumatera</a>
                                    </b></li>
                                <ul class="bag2">
                                    <li>Rendang (Padang, Sumatera Barat)</li>
                                    <li>Sate Padang (Sumatera Barat)</li>
                                    <li>Pempek (Palembang, Sumatera Selatan)</li>
                                    <li>Tekwan (Palembang, Sumatera Selatan)</li>
                                    <li>Bika Ambon (Medan, Sumatera Utara)</li>
                                </ul>
                                <li><a name="jawa"><b>Makanan Khas Jawa</b></a></li>
                                <ul class="bag2">
                                    <li>Lontong Balap (Jawa Timur)</li>
                                    <li>Gudeg (Yogyakarta) Cenil (Yogyakarta)</li>
                                    <li>Nasi Timbel (Jawa Barat)</li>
                                    <li>Asinan Betawi (Jakarta)</li>
                                    <li>Soto Kudus (Jawa Tengah)</li>
                                </ul>
                                <li><a name="bali"><b>Makanan Khas Bali</b></a></li>
                                <p>Bebek Betutu, Nasi Jinggo, Sate Lilit, Sate Pentul, Bebek Bengil, Ayam Betutu,
                                    Rujak Buleleng, Siobak Khe Lok, Nasi Campur Bali, Ikan Asap, Sambal Matah, Rujak
                                    Kuah Pindang.</p>
                                <li><a name="kalimantan"><b>Makanan Khas Kalimantan</b></a></li>
                                <ul class="bag2">
                                    <li>Soto Banjar (Kalimantan Selatan)</li>
                                    <li>Ikan Patin Baubar (Kalimantan Selatan)</li>
                                    <li>Ikan Asin Richa (Kalimantan Utara)</li>
                                    <li>Asam Pedas Tempoyak (Kalimantan Barat)</li>
                                    <li>Ikan Jelawat (Kalimantan Tengah)</li>
                                </ul>
                                <li><a name="papua"><b>Makanan Khas Papua</b></a></li>
                                <p>Papeda, Kue Lontar, Ikan Bakar Manokwari, Sagu Lempeng, Ikan Bungkus, Udang
                                    Selingkuh, Kue Bagea, Sambal Colo-Colo.</p>

                            </ol>

                        </div>
                    </ol>
                </li>
                <div>
                    <li>
                        <h4><b>Kesimpulan</b></h4>
                    </li>
                    <p class="bag1">Keberagaman budaya di Indonesia berasal dari berbagai kebudayaan lokal yang
                        terus berkembang akibat pengaruh yang tampak dan merekah di masyarakat. Hal ini menciptakan
                        kebudayaan yang unik dan kaya. Dalam perkembangannya, kebudayaan memainkan peran penting
                        dalam meningkatkan semangat nasionalis dengan memuat nilai-nilai sosial yang diterapkan oleh
                        masyarakat Indonesia.</p>
                    <p class="bag1">Meskipun demikian, dengan semakin globalnya informasi, budaya Indonesia semakin
                        tersebar di luar negeri. Beberapa negara telah mengenal budaya asli Indonesia dan tertarik
                        untuk mempelajarinya. Hal ini terjadi berkat semangat nasionalis para generasi muda
                        Indonesia yang tidak hanya mempertahankan budaya lokal, tetapi juga menyebarkannya ke luar
                        negeri.</p>

                </div>
            </ol>
        </div>

        <div id="button">
            <p><button class="button1"><a href="budaya jawa.php">Link untuk melihat Budaya Jawa >></a></button></p>

            <p><button class="button2"><a href="budaya sunda.php">Link untuk melihat Budaya Sunda >></a></button>
            </p>

        </div>
        <br><br><br>
        <font>
            <h3>Tinggalkan Pesan Anda Disini</h3>
        </font>

        <div class="form">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Ambil data dari formulir
                $namaLengkap = $_POST["fullname"];
                $email = $_POST["email"];
                $nomorTelepon = $_POST["phone"];
                $pesan = $_POST["pesan"];

                // Simpan data ke file atau database jika diperlukan
            }
            ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkapmu.." required>

                <label for="email">Email</label>
                <input type="text" id="email" name="email" placeholder="Emailmu.." required>

                <label for="phone">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" placeholder="Nomor Teleponmu.." required>

                <label for="pesan">Pesan Anda</label>
                <textarea name="pesan" id="pesan" placeholder="Pesan.." required></textarea>

                <input type="submit" name="submit" value="Submit">
            </form>
        </div>

        <div class="footer">
        <div class="footer2">
                <ul>
                    <li><a href="index.php">Halaman Utama</a></li>
                    <li><a href="budaya sunda.php">Budaya Sunda</a></li>
                    <li><a href="budaya jawa.php">Budaya Jawa</a></li>
                    <li><a href="datadiri_mhs.php">Informasi Kelompok</a></li>
                </ul>
            <b><p>&copy; 2024 Mengenal Budaya Indonesia</p></b>
            <p>Design By: Kelompok 3</p>
            
        </div>
    </div>

</body>

</html>