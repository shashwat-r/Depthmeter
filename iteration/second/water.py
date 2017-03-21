import serial 
import MySQLdb

#establish connection to MySQL. You'll have to change this for your database.
dbConn = MySQLdb.connect(user="root",passwd="root",db="iot_database",unix_socket='/Applications/MAMP/tmp/mysql/mysql.sock') or die ("could not connect to database")
#open a cursor to the database
cursor = dbConn.cursor()

device = '/dev/cu.usbmodem1411' #this will have to be changed to the serial port you are using
try:
  print "Trying...",device 
  arduino = serial.Serial(device, 9600) 
except: 
  print "Failed to connect on",device    

while 1:
  if arduino.inWaiting():
    data = arduino.readline()  #read the data from the arduino
    pieces = data.split("\t")  #split the data by the tab
    query="INSERT INTO Water_Level (Level) VALUES("+pieces[0]+")"
    cursor.execute(query)
    dbConn.commit() #commit the insert
    
cursor.close()  #close the cursor