rem : choose browser // 2022年5月21日9:57:21
goto yandex

rem goto opera
goto firefox
REM goto chrome

REM ================================
REM 	open with : firefox
REM 	2022年3月2日9:56:19
REM ================================


:yandex
set browser="C:\Users\iwabuchiken\AppData\Local\Yandex\YandexBrowser\Application\browser.exe"

set url="http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"

%browser% %url%

goto end



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
