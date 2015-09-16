# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Wednesday, 16 September 2015
# File		: server.py

import SocketServer, threading, sys, os

class MyTCPHandler(SocketServer.BaseRequestHandler):
	def handle(self):
		print str(self.client_address[0]) + " connected"

		menu = "\n"
		filename = ""
		counter = 0

		for file in os.listdir("File"):
    			if(file.endswith(".txt")):
				counter = counter + 1
				menu = menu + str(counter) + ". " + file + "\n"
				filename = filename + file + "\n"
		self.request.send(menu.rstrip("\n"))
		while 1:
			self.msg = self.request.recv(1024)
			if(not self.msg):
				break
				self.msg = self.msg.strip()
			if(self.msg == "dadah"):
				print str(self.client_address[0]) + " disconnected"  
				break
			print str(self.client_address[0]) + " Client wrote : " + self.msg
			
			if((self.msg + ".txt") in filename.split()):
				file = open("File/" + self.msg + ".txt", "r")
				self.request.send(file.read().rstrip('\n'))
			else:
				self.request.send("text unavailable")

if __name__ == "__main__":
	if(len(sys.argv) < 2):
		print "Usage : phyton server.py port"
		sys.exit()
	host = "192.168.100.30"
	port = int(sys.argv[1])
	server = SocketServer.TCPServer((host, port), MyTCPHandler)
	server.serve_forever()
