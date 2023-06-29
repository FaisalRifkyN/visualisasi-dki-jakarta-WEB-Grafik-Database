import pandas as pd
import matplotlib.pyplot as plt
import os
import pymysql

# Buat koneksi database
connection = pymysql.connect(
    host='localhost',
    user='root',
    password='',
    db='dki_jakarta',
    charset='utf8mb4',
    cursorclass=pymysql.cursors.DictCursor
)

# Membaca data dari file CSV
data = pd.read_csv('resources/views/admin/visualisasi/data/data.csv')

# Menghitung jumlah jenis usaha di setiap kecamatan
count_by_kecamatan = data.groupby('kecamatan')['jenis_usaha'].size()

# Mengatur ukuran grafik
fig = plt.figure(figsize=(10, 6))

# Membuat grafik batang horizontal dengan warna yang berbeda
count_by_kecamatan.plot(kind='barh', color=['#FFCE54', '#FC6E51', '#A0D468', '#4FC1E9', '#ED5565'])

# Mengatur label sumbu x dan y
plt.xlabel('Jumlah Jenis Usaha')
plt.ylabel('Kecamatan')

# Memberikan judul grafik
plt.title('Sebaran Jenis Usaha di Setiap Kecamatan di Jakarta', fontsize=14, fontweight='bold')

# Menghilangkan garis di sekeliling grafik
plt.gca().spines['top'].set_visible(False)
plt.gca().spines['right'].set_visible(False)

# Mendapatkan jalur lengkap untuk folder 'public/assets/img'
folder_path = os.path.join(os.getcwd(), 'public', 'assets', 'img')

# Membuat folder jika belum ada
os.makedirs(folder_path, exist_ok=True)

# Simpan grafik sebagai file gambar di folder 'public/assets/img'
file_path = os.path.join(folder_path, 'grafik4.png')
plt.savefig(file_path)
plt.close()

# Simpan nama file ke dalam database
with connection.cursor() as cursor:
    sql = "INSERT INTO grafik (img) VALUES (%s)"
    cursor.execute(sql, ('grafik4.png',))  # Ubah sesuai dengan nama file yang dihasilkan
    connection.commit()
