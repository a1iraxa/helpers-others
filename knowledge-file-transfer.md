What is the fastest way to transfer files between two PCs?
Via Ethernet.
I hope you have a lan cable lying around. If its a Cat 6 cable, then you would get 1Gbps speed. Otherwise you will be limited to 100Mbps (usually).
1) Go to source pc, open network adapter settings>Properties>IPv4 settings.
Give the details like below( manual settings). If you previously have any settings configured just note down it.
	.	IP : 10.0.0.1 
	.	
	.	Subnet : 255.0.0.0 
	.	
	.	Gateway : 10.0.0.2 
	.	 
Leave DNS empty.
2) Go to destination PC.
Give the settings as below.
	.	IP : 10.0.0.2 
	.	
	.	Subnet : 255.0.0.0 
	.	
	.	Gateway : 10.0.0.1 
	.	 
3) Do a ping test from both source to destination and vice versa
	.	Command prompt > ping 10.0.0.2 
	.	 
( From Source)
	.	Command prompt > Ping 10.0.0.1 
	.	 
( From destination)
It should succeed.
4) Enable file and printer sharing, and disable password protected sharing and
Make the pc as discoverable for both PC's( When you open network from my computer, it wil show a yellow popup for same, or blue popup in case of win 8 and above when new network is detected, Google it , in case you face difficulty, let me know in comments).
5) Go to run in source machine , type in
	.	\\10.0.0.2 
	.	 
At this point,, you should be able to see the Users folder of the destination machine. You can copy your files to Users>Public folder if your C drive has enough free space.
6) If not , go to any other drive, create a new folder, right click the same, click sharing, that will.open up sharing settings, click share this folder, in permissions, click full access.
(Google for how to share a folder in windows, or let me know in comments)
7) After this you should be able to view the newly created folder when you open up \\10.0.0.2 and you can copy.
Hope this helps.
Sorry for being little vague answer as I am typing it out from phone.
Edit 1 : Corrected IP to be entered in run
Edit 2 :You can even open any remote drive directly and copy. No need to create share folders. Just type in
	.	\\10.0.0.1\d$ 
	.	 
where 10.0.0.1 is the IP address and D is the drive you want to open. In this case you will need to enter the admin username and password of the target PC.
