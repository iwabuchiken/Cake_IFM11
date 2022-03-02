rem goto opera
goto firefox
REM goto chrome

REM ================================
REM 	open with : firefox
REM 	2022”N3ŒŽ2“ú9:56:19
REM ================================
:firefox
pushd "C:\Program Files\Mozilla Firefox"
start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"

goto end


REM ================================
REM 	open with : opera
REM 	2019/08/13 08:12:49
REM ================================
:opera
	pushd "C:\WORKS_2\Programs\opera"
	start launcher.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"

	goto end

REM ================================
REM 	open with : chrome
REM 	2019/08/13 08:12:49
REM ================================
:chrome
	pushd "C:\Program Files (x86)\Google\Chrome\Application"
	start chrome.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"

	goto end
	
REM pushd "C:\Program Files\Mozilla Firefox"
REM start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"

REM goto end

:end
