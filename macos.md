https://thewebsitedev.com/compress-folders-mac-ds_store-files/
zip -r my-folder.zip my-folder -x "*.DS_Store"
======================
zip is a compression and packaging file utility for Unix.
-r is for recursively including all folders underneath the target folder.
my-folder.zip is the name of the compressed file we want to create.
my-folder is the name of our target folder. The folder we want compressing.
-x "*.DS_Store" is to exclude all files whose path ends with the string “.DS_Store”.

unzip my-foler.zip

======================
https://apple.stackexchange.com/questions/32785/is-there-a-way-to-show-the-speed-of-copying-files-on-a-mac

If you're comfortable in the Terminal, you can use rsync to copy some files from one place to another and it'll give you summary stats on the speed:

rsync -a --progress --stats --human-readable path_to_source path_to_dest
E.g. rsync --stats --human-readable ~/Desktop/Large-File /Volumes/OtherDisk/Dir

You can also type into the terminal just the command:

rsync -a --progress --stats --human-readable
(note there needs to be one or more spaces after --human-readable to end that command and break before the source and destination file names are provided)

======================
Recursively delete all files of a specific extension in the current directory?
find . -name "*.bak" -type f -delete
But use it with precaution. Run first:
find . -name "*.bak" -type f
======================
Copy all files with a certain extension from all subdirectories
find . -name \*.xls -exec cp {} destination \;
Instead of all the above, you could use zsh and simply type
cp **/*.xls destination
======================

man ls (man means for manual for command)
ls list all directores
ls -a list all directries with hidden ones
pwd print working directory
echo "Something to print in terminal"
whoami will print current user name
touch file-name to create new file in current directory
vim file_name to edit file in vim editor
i fot insert content in file
Press Esc and then :wq (colon w for write and q for quit) press enter
cat file_name to print file content in terminal
cat -b file_name to print line number
rm -rf file_name for removing file
rm -rf dicrectory_name for removing
mkdir directory_name to create directory
cp file_name destination to copy file e.g: cp list.txt ./copied/

FOR Operating system data:
OS Name:
uname
OS Full details:
uname -a
Processor type:
uname -p
Machine Hardware name:
uname -m

