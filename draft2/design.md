# DDoS-ing Gaggle
By Cole Weinstein and Robbie Young

## Abstract
Our design revoles around having two seperate servers: an open-facing webserver which hosts Gaggle's main website, which authenticates user logins using an authentication server, with both servers being located on the same private network. However, the webserver negiotates encryption upon booting, and an attacker can exploit this to place themselves in the middle of the two servers and authorize logins with admin privileges. Once they have access to the site, there are pages that are only accessible by admins which allow file uploads and grant the user access to the internals of the webserver.

## Current Attack
- Run a directory scanning tool on the website to find all potential pages
- Arpspoof the webserver to make it think that the auth server is you (and potentially the reverse for the auth server too) 
- Launch a DDoS attack on Gaggle (using hping3 or another DDoS-ing tool of your choice)
    - sudo hping3 -S -p -80 –flood IP
- Continuously load the website to verify that Gaggle has been taken down
- Stop the DDoS
- Intercept the key exchange between the webserver and the authserver, such that you now have a shared key with the webserver
- Login with whatever credentials, intercept the authentication attempt from the webserver for that user
- Respond to the webserver with a thumbs up and admin privileges
- Navigate to the previously-innacessible file upload admin page
- Upload a reverse shell
- Navigate to the reverse shell and run it
- Find old php file with hard coded credentials for a database query
- Try credentials in a login to the system and find that they work
- Sudo using credentials to get root access

## Current Implementation
Currently, we have setup a basic Apache webserver running on an Ubuntu virtual machine. We have made a slight change to the TCP configuration of the webserver to enable our DDoSing capabilities as an attacker.
As the attacker, we have tested running our DDoS-ing tool, hping3, on the webserver, and verified that it behaves as expected and takes the webserver offline. We have also begun to set up automated scripts to restart the server after it's been DDoS-ed.

## "Deep Dive" Stuff
- Anatomy of a DDoS attack (and strategies to fight one)
- SYN queues
- ARP spoofing
- Realisitic encryption methods between auth server and webserver
- How users are usually authenticated on websites