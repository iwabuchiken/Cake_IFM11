goto opera
REM goto chrome



REM pushd "C:\Program Files\Mozilla Firefox"
REM start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/admins/edit/3"

REM ================================
REM 	open with : opera
REM 	2019/08/13 08:12:49
REM ================================
:opera
	pushd "C:\WORKS_2\Programs\opera"
	start launcher.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/admins/edit/3"

	goto end

REM ================================
REM 	open with : chrome
REM 	2019/08/13 08:12:49
REM ================================
:chrome
	pushd "C:\Program Files (x86)\Google\Chrome\Application"
	start chrome.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/admins/edit/3"

	goto end
	
rem pause

:end
