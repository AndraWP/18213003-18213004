# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Thursday, 29 Oktober 2015
# File		: rsync.py

import urllib
import urllib2
import os

from bs4 import BeautifulSoup

#Membuka akses ke URL tertentu
resp = urllib2.urlopen( 'http://www.detik.com' )
soup = BeautifulSoup( resp.read() )

#variabel untuk penamaan file 
i =1

#Mencari semua image pada alamat yang diakses
for anchor in soup.findAll('img', src=True):  
	w = anchor['src']
	# Hanya melakukan proses pada link gambar yang berformat jpg
	if ( str(w).endswith( 'jpg' )):
		# menampilkan link gambar pada terminal
		print w
		# membuat variabel nama string untuk menyimpan file
		x = str(i)+".jpg"
		#Mendownload web page dan menyimpan ke file html  		
		urllib.urlretrieve( w , x )
		#Penambahan variabel i
		i = i+1

#Melakukan proses rsync untuk file gambar yang telah berhasil di download
print os.system("rsync -a --progress --include '*/' --include '*.jpg' --exclude '*' /home/andra/Documents /home/andra/Documents/Backup")
