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

# Menghitung jumlah jenis usaha
counts = data.groupby('jenis_usaha').size()

# Mengatur ukuran grafik
fig = plt.figure(figsize=(10, 6))

# Menentukan warna yang akan digunakan pada grafik
colors = ['#FFCE54', '#FC6E51', '#A0D468', '#4FC1E9', '#ED5565']

# Membuat grafik pie chart
counts.plot(kind='pie', autopct='%1.1f%%', startangle=90, colors=colors, wedgeprops={'linewidth': 2, 'edgecolor': 'white'})

# Memberikan judul grafik
plt.title('Jenis Usaha di Jakarta', fontweight='bold')

# Mengubah tulisan label menjadi vertikal
plt.xticks(rotation='vertical')

# Mengatur font size label
plt.xticks(fontsize=10)
plt.yticks(fontsize=10)

# Menghilangkan kotak spines di sekitar grafik
plt.gca().spines['top'].set_visible(False)
plt.gca().spines['right'].set_visible(False)
plt.gca().spines['bottom'].set_visible(False)
plt.gca().spines['left'].set_visible(False)

# Mendapatkan jalur lengkap untuk folder 'public/assets/img'
folder_path = os.path.join(os.getcwd(), 'public', 'assets', 'img')

# Membuat folder jika belum ada
os.makedirs(folder_path, exist_ok=True)

# Simpan grafik sebagai file gambar di folder 'public/assets/img'
file_path = os.path.join(folder_path, 'grafik.png')
plt.savefig(file_path)
plt.close()

# Simpan nama file ke dalam database
with connection.cursor() as cursor:
    sql = "INSERT INTO grafik (img) VALUES (%s)"
    cursor.execute(sql, ('grafik.png',))  # Ubah sesuai dengan nama file yang dihasilkan
    connection.commit()
