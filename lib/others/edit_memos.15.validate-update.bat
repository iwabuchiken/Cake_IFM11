rem : 2022”N3ŒŽ2“ú9:59:45
goto yandex
rem goto firefox

rem goto opera
REM goto chrome

rem : yandex // 2022”N5ŒŽ21“ú10:00:44
:yandex
set browser="C:\Users\iwabuchiken\AppData\Local\Yandex\YandexBrowser\Application\browser.exe"

set url_1="http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index_2"
set url_2="http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

%browser% %url_1%
%browser% %url_2%

goto end

REM ================================
REM 	open with : firefox
REM 	2022”N3ŒŽ2“ú10:00:00
REM ================================
:firefox
pushd "C:\Program Files\Mozilla Firefox"

REM 	start launcher.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index"
start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index_2"

start firefox.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

goto end

REM ================================
REM 	open with : opera
REM 	2019/08/13 08:12:49
REM ================================
:opera
	pushd "C:\WORKS_2\Programs\opera"
	
REM 	start launcher.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index"
	start launcher.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index_2"
	start launcher.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

	goto end

REM ================================
REM 	open with : chrome
REM 	2019/08/13 08:12:49
REM ================================
:chrome
	pushd "C:\Program Files (x86)\Google\Chrome\Application"
	start chrome.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index"
	start chrome.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"
	
	goto end
	
REM pushd "C:\Program Files\Mozilla Firefox"
REM start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/add_From_DB_File?command=GO"



REM pushd "C:\Program Files\Mozilla Firefox"
REM start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index"
REM start firefox.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager"

REM goto end

:end
