# List of vulnerabilities
- privilege escalation
- lateral movement
- searchsploit vulnerabilities
    - look into common services used for common things (apache for webservers, sql for databases, etc.)
- physical hardware vulns (usb?)
- old hashing methods weaknesses / mass cracking passwords
- https://owasp.org/www-project-top-ten/
- AITM
- arp poisoning
- remote file inclusion
- local file inclusion
- SQl injection
- command injection
- cross site scripting
- steal da cookies, om nom nom

# Chain of vulnerabilties
Have two servers talking on a local network. One server is outward facing (webserver) and the other is an authentication service used for that webserver. The webserver allows files to be uploaded, but only allows an admin account (or someone with equivalent permissions) to access the folder containing the uploaded files.
- Arpspoof both servers on the local network such that the attacker acts as an AITM between the two servers
(we know that upon reboot they negotiate a private key using Diffie-Hellman)
- DDOS the outward facing website
- Intercept the private key negotiation between the two servers such that the attacker can now see and modify all traffic between the two
- Authenticate and give permissions to login to the webserver as website admin
- Upload a php script that enables a reverse shell
- As admin navigate to the uploaded files diretory and run the reverse shell script; get root access.

# Story
- Gaggle has an image upload website used to train their machine learning models. Users are able to upload images and label them as they please and share them with their friends, but Gaggle says that they will use these images to train their models. As a user you are fine with this because you know Gaggle is a good hearted company and would never sell your data, but a hacker may have other thoughts.