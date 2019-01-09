import urllib2 #library used for getting page content
import requests #library to make requests

#Get webpage content
#resp = urllib2.urlopen('http://localhost/ONI/index.php')
#page = resp.read()
#print page

#Make post request ex:send ID
params = {'name': 'John','email': 'John.doe@example.com'}
response = requests.get('http://localhost/ONI/index.php', params=params)
print response.content
