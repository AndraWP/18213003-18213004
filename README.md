# 18213003-18213004
Tugas Kuliah II3160 Pemrograman Integratif

Kelompok: <br>
1. Jenika Sutojo - 18213003 <br>
2. Andra Wahyu Purnomo - 18213004

Draft Pengumpulan: <br><br>
1. Tugas 1 - 10 September 2015<br>
   Pembuatan socket programming client dan server sehingga bisa melakukan koneksi.<br>
   Nama File: Client.java dan Server.java<br><br>
2. Tugas 2 - 15 September 2015<br>
   Pembuatan socket programming saat server memberikan respons berupa daftar nama file dan client dapat memilih file text yang diinginkan dan manampilkan isi file tersebut. Program server dapat menampilkan nama file apa saja yang tersedia di dalam folder bernama "File" dan kemudian menampilkan nama file tersebut di dalam terminal dan dikirimkan kepada client. Client dapat memilih file mana yang akan ditampilkan. Setelah melakukan request nama file dan server melakukan response, isi file dapat ditampilkan di terminal. <br>
   Nama File: client.py dan server.py<br><br>
3. Tugas 3 - 29 Septermber 2015<br>
   Pembuatan program crawling halaman web. Program ini dapat melakukan: (1) Menyimpan halaman web menjadi file html; (2) Menampilkan semua link yang terhubung pada halaman web tersebut; (3) Menyimpan semua link halaman web menjadi file html. <br>
   Nama File: web.py<br><br>
4. UTS - 29 Oktober 2015<br>
   Pembuatan program untuk mengunduh semua image berformat jpg dalam sebuah webpage. Setiap image yang diunduh lalu secara otomatis di-backup ke folder yang lain dengan menggunakan rsync. Program dalam menampilkan semua link image dari webpage tertentu dan kemudan mendownload semua tautan gambar tersebut dan menyimpannya ke local. Program juga memiliki fungsi rsync untuk dapat melakukan backup semua gambar yang telah di download dan menyimpan ke folder lain. <br>
   Selain menggunakan bahasa phyton, kami juga membuat menggunakan shell scripting dengan memanfaatkan fungsi wget untuk mendownload gambar dari suatu link tertentu. Setelah semua gambar berformat jpg tersebut terdownload, kemudian dilakukan rsync dan mengkopi semua file yang berekstensi jpg pada folder image backup.<br>
   Nama File: rsync.py dan rsync.sh<br><br>
5. Tugas 4 - 3 November 2015<br>
   Pembuatan program PHP SOAP client dan server. Di dalam program ini, memungkinkan client untuk melakukan request dengan cara memanggil fungsi-fungsi yang ada pada server. Terdapat 3 fungsi yang dipanggil. Diantaranya ada fungsi untuk mengeluarkan kata "Hello World!", fungsi untuk melakukan penjumlahan sederhana, dan fungsi untuk menampilkan data menggunakan query pada database yang diakses. Program ini mensimulasikan salah satu model web service yaitu SOAP. Server akan menyediakan hal yang direquest oleh client, dalam hal ini fungsi-fungsi program.<br>
   Nama File: soap-client.php dan soap-server.php<br><br>
6. Tugas 5 - 5 November 2015<br>
   Pembuatan program rest-api.php dan rest-client.php. Di dalam program ini, memungkinkan membuat sebuah API yang dapat mengakses database hotel. Source code rest-api akan terlebih dahulu melakukan koneksi pada database. Setelah itu kami memasukan syntas query untuk mengakses data spesifik dari database hotel yang telah dikoneksikan. Fungsi get_info_by_id mengembalikan info query. Selain itu, di dalam source code rest-api.php juga terdapat pengaksesan data dengan memasukkan nomor IDnya saja dan mengembalikan nilai hasil tersebut. Pada source code rest-client, memungkinkan client untuk dapat mengakses sebuah database dengan memasukkan nomor ID saja, karena telah dilakukan API dengan file rest-api.php pada databsae hotel. Di dalam source code ini, kami juga membuat sebuah tabel untuk menampilkan data ID dan Nama dari input nomor ID yang spesifik oleh client.<br>
   Nama File: rest-api.php dan rest-client.php<br><br>
7. UAS Final Project - 23 Desember 2015<br>
   Membuat sebuah web service untuk dapat memasukkan data (event, komunitas, dan mahasiswa/data kader) dan juga menampilkan data-data tersebut. Program tersebut memanfaatkan metode POST dan REST. Untuk setiap data yang dimasukkan, client akan mengisi sebuah form. Nantinya, saat client menekan submit, maka data tersebut disimpan ke dalam sebuah database menggunakan metode POST dan memanggil fungsi untuk memasukkan data tersebut di dalam database menggunakan file API yang telah dibuat. Selain menampilkan semua data yang dimasukkan, kami juga membuat program untuk melihat detail dari setiap data yang dimasukkan.<br>
   Nama File: datakader-client.php, event-api.php, event-client.php, event-depan.php, event-detail.php, komunitas-client.php, suksesform.php<br><br>
