
## ** Instruksi Proyek**  

**Sebelum UTS** → **Company Profile**  
**Setelah UTS** → **Portofolio dengan Header & Dashboard**  

🔹 **Jika menggunakan template dari sumber lain, wajib mencantumkan nama pembuat & link sumbernya.**  

---

## **Konfigurasi Docker & Composer**  

**1. Environment Variables untuk Ujian:**  
```sh
COMPOSER_PROJECT_NAME=namasaya  # Nama tanpa spasi
REPOSITORY_NAME=Project_UAS      # Nama repository proyek
IMAGE_TAG=nim                    # Gunakan NIM sebagai tag image
```

**2. Konfigurasi Volume di `docker-compose.yml`:**  
```yaml
volumes:
  - ./nginx/nginx.conf:/etc/nginx/conf.d/default.conf
```
*(Pastikan file `nginx.conf` berisi konfigurasi yang benar untuk menjalankan proyek di Docker.)*  

**3. Pastikan port di `docker-compose.yml` sama dengan yang ada di `nginx.conf` (listen port) untuk menghindari konflik jaringan.**  

---

## ** Rekomendasi Extension di VS Code untuk HTML**  
**Auto Close Tag** → Menutup tag HTML secara otomatis.  
**Auto Complete Tag** → Melengkapi tag HTML dengan cepat.  
**Auto Rename Tag** → Mengubah tag pembuka dan penutup secara bersamaan.  

# Catatan Perintah Docker

```
# Menjalankan dan membangun ulang container
docker compose up -d --build
```
- `up`: Menjalankan container berdasarkan konfigurasi di `docker-compose.yml`.
- `-d`: Mode detaching (berjalan di background).
- `--build`: Membangun ulang image sebelum menjalankan container.

```
# Menghentikan dan menghapus container serta network yang terkait
docker compose down
```
- Menghentikan semua container dalam `docker-compose.yml` dan menghapusnya.
- Juga menghapus network yang dibuat oleh `docker-compose`.

```
# Menghapus semua container yang sudah berhenti
docker container prune
```
- Menghapus container yang tidak aktif atau sudah dihentikan.

```
# Menghapus image yang tidak digunakan
docker image prune
```
- Menghapus image yang tidak terpakai untuk menghemat ruang penyimpanan.

```
# Menghapus volume yang tidak digunakan
docker volume prune
```
- Menghapus volume yang tidak lagi digunakan oleh container mana pun.

### Langkah-Langkah Menjalankan HTML

#### **1. Buat Struktur Direktori**
```
mkdir html
cd html
mkdir pert1
cd pert1
mkdir coding
mkdir tugas
mkdir gambar
```

#### **2. Buat File HTML di Folder `coding`**
- Buat file baru `index.html` dalam folder `coding`.
- Tambahkan kode berikut:

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan HTML</title>
</head>
<body>
    <h1>Latihan HTML</h1>
    <p>Ini adalah contoh latihan pertama.</p>
    <img src="../gambar/contoh.jpg" alt="Contoh Gambar" width="300">
</body>
</html>
```

#### **3. Tambahkan Gambar ke Folder `gambar`**
- Letakkan file gambar ke dalam folder `gambar`.
- Gunakan tag `<img>` seperti contoh di atas untuk menampilkan gambar.
- Simpan perubahan dengan **Ctrl + S**.

#### **4. Buat File `docker-compose.yml`**
- Buat file `docker-compose.yml` dalam direktori `html`.
- Tambahkan konfigurasi berikut:

```yaml
version: '3.8'
services:
  web:
    image: nginx:latest
    volumes:
      - ./pert1:/usr/share/nginx/html
    ports:
      - "8080:80"
```

#### **5. Jalankan Docker dan Akses HTML**
```
# Jalankan Docker
cd html
docker compose up -d
```
- Buka browser dan akses `http://localhost:8080/coding/index.html` untuk melihat halaman HTML.

#### **6. Menghentikan Docker**
```
docker compose down
```


# **Daftar Lengkap Tag HTML dan Fungsinya**

## **1. Struktur Dasar HTML**
- `<html>` : Menandai awal dan akhir dokumen HTML.
- `<head>` : Berisi metadata dan informasi tentang dokumen.
- `<title>` : Menentukan judul halaman yang muncul di tab browser.
- `<body>` : Berisi konten utama yang ditampilkan di browser.
- `<meta>` : Menyimpan informasi meta seperti charset dan deskripsi halaman.
- `<link>` : Menghubungkan dengan file CSS eksternal.
- `<style>` : Menulis CSS langsung di dalam HTML.
- `<script>` : Menjalankan kode JavaScript.
- `<!DOCTYPE>` : Menentukan tipe dokumen HTML.

## **2. Heading dan Paragraf**
- `<h1>` hingga `<h6>` : Heading (judul) dari yang terbesar ke terkecil.
- `<p>` : Paragraf teks.
- `<br>` : Baris baru.
- `<hr>` : Garis horizontal pemisah.

## **3. Format Teks**
- `<b>` / `<strong>` : Teks tebal.
- `<i>` / `<em>` : Teks miring.
- `<u>` : Teks bergaris bawah.
- `<mark>` : Menyorot teks dengan warna latar belakang.
- `<small>` : Teks lebih kecil.
- `<sub>` : Teks kecil di bawah (subscript).
- `<sup>` : Teks kecil di atas (superscript).
- `<ins>` : Menandai teks yang ditambahkan.
- `<del>` : Menandai teks yang dihapus.
- `<blockquote>` : Menampilkan kutipan panjang.
- `<code>` : Menampilkan teks dalam format kode pemrograman.
- `<pre>` : Menampilkan teks dengan format asli (preformatted).

## **4. Link dan Navigasi**
- `<a href="URL">` : Membuat hyperlink ke halaman lain.
- `<nav>` : Menandai bagian navigasi dalam halaman web.
- `<button>` : Membuat tombol yang dapat diklik.

## **5. Gambar dan Media**
- `<img src="URL" alt="Deskripsi">` : Menampilkan gambar.
- `<audio>` : Menambahkan audio ke halaman web.
- `<video>` : Menambahkan video ke halaman web.
- `<source>` : Menentukan sumber media dalam `<audio>` atau `<video>`.
- `<iframe>` : Menyematkan halaman web lain dalam halaman.

## **6. Daftar (List)**
- `<ul>` : Daftar tidak berurutan (bullet point).
- `<ol>` : Daftar berurutan (angka).
- `<li>` : Item dalam daftar.
- `<dl>` : Daftar definisi.
- `<dt>` : Istilah dalam daftar definisi.
- `<dd>` : Deskripsi dari istilah dalam daftar definisi.

## **7. Tabel**
- `<table>` : Membuat tabel.
- `<tr>` : Baris dalam tabel.
- `<td>` : Sel dalam tabel.
- `<th>` : Sel untuk header tabel (teks tebal dan tengah).
- `<thead>` : Bagian kepala tabel.
- `<tbody>` : Bagian isi tabel.
- `<tfoot>` : Bagian kaki tabel.
- `<colgroup>` : Menentukan kelompok kolom.
- `<col>` : Menentukan atribut untuk kolom dalam `<colgroup>`.
- `<caption>` : Menambahkan keterangan tabel.

## **8. Formulir**
- `<form>` : Membuat formulir input.
- `<input>` : Elemen input seperti teks, tombol, checkbox.
- `<textarea>` : Kotak input teks panjang.
- `<button>` : Tombol dalam formulir.
- `<select>` : Dropdown list.
- `<option>` : Opsi dalam dropdown list.
- `<label>` : Label untuk elemen input.
- `<fieldset>` : Mengelompokkan elemen dalam formulir.
- `<legend>` : Menambahkan judul dalam `<fieldset>`.
- `<datalist>` : Menyediakan daftar opsi untuk `<input>`.
- `<optgroup>` : Mengelompokkan opsi dalam `<select>`.
- `<output>` : Menampilkan hasil dari perhitungan/formulir.

## **9. Layout dan Struktur**
- `<header>` : Bagian atas halaman, biasanya untuk judul dan navigasi.
- `<footer>` : Bagian bawah halaman.
- `<section>` : Menandai bagian dalam halaman.
- `<article>` : Bagian independen yang dapat berdiri sendiri.
- `<aside>` : Bagian samping (sidebar).
- `<main>` : Menandai bagian utama halaman.
- `<div>` : Kontainer umum untuk mengelompokkan elemen.
- `<span>` : Menandai bagian kecil dalam teks tanpa efek layout.

## **10. Elemen Interaktif**
- `<details>` : Menampilkan informasi yang dapat diperluas.
- `<summary>` : Menentukan ringkasan dalam `<details>`.
- `<dialog>` : Membuat dialog pop-up (modal).
- `<progress>` : Menampilkan progres dalam bentuk bar.
- `<meter>` : Menampilkan nilai dalam rentang tertentu.

## **11. Elemen Khusus**
- `<abbr>` : Menampilkan singkatan dengan keterangan saat di-hover.
- `<cite>` : Menandai kutipan sumber.
- `<address>` : Menampilkan alamat dalam format khusus.
- `<time>` : Menampilkan tanggal/waktu.
- `<wbr>` : Menentukan titik pemisah kata.
