# Name/NIM	: Jenika Sutojo/18213003 - Andra Wahyu Purnomo/18213004
# Day, Date	: Wednesday, 16 September 2015
# File		: client.py

import socket, sys

if __name__ == "__main__":
	if(len(sys.argv) < 3):
		print "Usage : phyton client.py hostname port"
		sys.exit()
	host = sys.argv[1]
	port = int(sys.argv[2])

	sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	sock.settimeout(5)

	try:
		sock.connect((host,port))
	except:
		print "Unable to connect"
		sys.exit()
	print "Connected to server. Type 'dadah' to end the connection"

	rsp = sock.recv(1024)
	print "Menu: " + rsp
	print "Write the name of file: "

	msg = ""

	while(msg != "dadah"):
		msg = sys.stdin.readline()
		msg = msg.rstrip('\n')
		sock.send(msg)

		rsp = sock.recv(1024)
		print "Server wrote: " + rsp
	print "You are disconnected"
	sock.close()
