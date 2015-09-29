# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Tuesday, 29 September 2015
# File		: web.py

import urllib
from bs4 import BeautifulSoup

#Mendownload web page dan menyimpan ke file html
urllib.urlretrieve("http://www.andrawahyupurnomo.blogspot.co.id/", "test.html")

#Mengakses file html dari web page yang disimpan
soup = BeautifulSoup(open("test.html"))

#variabel untuk penamaan file 
i =1

#Menampilkan semua link yang ada di file html
for anchor in soup.findAll('a', href=True):
    #memasukan anchor['href'] ke dalam w
    w = anchor['href']
    # Hanya melakukan proses pada link ( diawali dengan http )
    if ( str(w).startswith( 'http' )):   
   		# menampilkan link pada terminal
   		print w
   		# membuat variabel nama string untuk menyimpan file
   		x = str(i)+".html"
   		#Mendownload web page dan menyimpan ke file html
   		urllib.urlretrieve( w , x )
   		#Penambahan variabel i
   		i = i+1
