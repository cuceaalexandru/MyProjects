import urllib2 #library used for getting page content
import requests #library to make requests
import socket# used to get hostname

#Get webpage content
#resp = urllib2.urlopen('http://localhost/ONI/index.php?')
#page = resp.read()
#print page

#Make post request ex:send ID
hostname = socket.gethostname() #sending bot id
params = {'id': hostname,'email': 'John.doe@example.com', "submit" : "OK"}
response = requests.post('http://localhost/ONI/cmd.php', params=params)
print response.content
