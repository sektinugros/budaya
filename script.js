// script.js

$(document).ready(function () {
    // Fungsi untuk mengatur animasi pada footer
    function animateFooter() {
      $(".footer2").addClass("animated fadeIn"); // Menambahkan kelas animated dan fadeIn dari Animate.css
  
      // Menambahkan event mouseover pada setiap link di footer
      $(".footer2 a").mouseover(function () {
        $(this).addClass("animated pulse"); // Menambahkan kelas animated dan pulse dari Animate.css
      });
  
      // Menambahkan event mouseout pada setiap link di footer
      $(".footer2 a").mouseout(function () {
        $(this).removeClass("animated pulse"); // Menghapus kelas animated dan pulse
      });
    }
  
    // Memanggil fungsi animasi saat halaman selesai dimuat
    animateFooter();
  });
  