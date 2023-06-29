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

# Menghitung jumlah kecamatan yang memiliki jenis usaha pada setiap wilayah
count_by_wilayah_kecamatan = data.groupby(['wilayah', 'kecamatan'])['jenis_usaha'].size().reset_index()

# Mengatur ukuran grafik
fig = plt.figure(figsize=(10, 6))

# Membuat grafik bar terpisah untuk setiap kecamatan
for wilayah in count_by_wilayah_kecamatan['wilayah'].unique():
    kecamatan_data = count_by_wilayah_kecamatan[count_by_wilayah_kecamatan['wilayah'] == wilayah]
    plt.bar(kecamatan_data['kecamatan'], kecamatan_data['jenis_usaha'], label=wilayah)

# Mengatur label sumbu x dan y
plt.xlabel('Kecamatan')
plt.ylabel('Jumlah Usaha')

# Memberikan judul grafik
plt.title('Sebaran Usaha pada Setiap Kecamatan di Jakarta', fontsize=14, fontweight='bold')

# Mengubah tampilan label sumbu x menjadi vertikal
plt.xticks(rotation='vertical')

# Menampilkan legenda
plt.legend(title='Wilayah')

# Menghilangkan garis di sekeliling grafik
plt.gca().spines['top'].set_visible(False)
plt.gca().spines['right'].set_visible(False)

# Mendapatkan jalur lengkap untuk folder 'public/assets/img'
folder_path = os.path.join(os.getcwd(), 'public', 'assets', 'img')

# Membuat folder jika belum ada
os.makedirs(folder_path, exist_ok=True)

# Simpan grafik sebagai file gambar di folder 'public/assets/img'
file_path = os.path.join(folder_path, 'grafik5.png')
plt.savefig(file_path)
plt.close()

# Simpan nama file ke dalam database
with connection.cursor() as cursor:
    sql = "INSERT INTO grafik (img) VALUES (%s)"
    cursor.execute(sql, ('grafik5.png',))  # Ubah sesuai dengan nama file yang dihasilkan
    connection.commit()
