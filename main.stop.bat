@ECHO OFF

REM http://stackoverflow.com/questions/8435952/how-to-get-pid-from-command-line-filtered-by-username-and-imagename
REM http://www.tomshardware.com/forum/82733-45-stop-program-command-line
taskkill /IM eclipse.exe
taskkill /IM wish.exe
taskkill /IM filezilla.exe
taskkill /IM xampp-control.exe

taskkill /IM github.exe

exit
