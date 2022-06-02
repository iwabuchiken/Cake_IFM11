rem : 2022”N6ŒŽ2“ú10:08:30
goto yandex

rem goto opera
REM goto chrome



REM pushd "C:\Program Files\Mozilla Firefox"
REM start firefox.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/admins/edit/3"

REM ================================
REM 	open with : opera
REM 	2019/08/13 08:12:49
REM ================================
:opera

set url_Image_Manager_Local=http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager

set url_IP_Basics=http://localhost:8001/ip/basics/

pushd "C:\WORKS_2\Programs\opera"

rem : page : inset data
start launcher.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/manage_IPhone_ImageFiles?db_file=ifm11_backup_20160110_080900.bk"

rem : page : http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager
start launcher.exe %url_Image_Manager_Local%

rem : page : http://localhost:8001/ip/basics/
start launcher.exe %url_IP_Basics%

rem : remote
start launcher.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index_2?sort=file_name&direction=desc"

	goto end

REM ================================
REM 	open with : yandex
REM 	2022”N6ŒŽ2“ú10:02:56
REM ================================
:yandex

set url_Image_Manager_Local=http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager

set url_IP_Basics=http://localhost:8001/ip/basics/

pushd "C:\Users\iwabuchiken\AppData\Local\Yandex\YandexBrowser\Application"

rem : page : inset data
start browser.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/manage_IPhone_ImageFiles?db_file=ifm11_backup_20160110_080900.bk"

rem : page : http://localhost/Eclipse_Luna/Cake_IFM11/images/image_manager
start browser.exe %url_Image_Manager_Local%

rem : page : http://localhost:8001/ip/basics/
start browser.exe %url_IP_Basics%

rem : remote
start launcher.exe "http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index_2?sort=file_name&direction=desc"

	goto end

REM ================================
REM 	open with : chrome
REM 	2019/08/13 08:12:49
REM ================================
:chrome

	pushd "C:\Program Files (x86)\Google\Chrome\Application"
	
	start chrome.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/manage_IPhone_ImageFiles?db_file=ifm11_backup_20160110_080900.bk"
	start chrome.exe http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index_2

	goto end



REM pushd "C:\Program Files\Mozilla Firefox"
REM start firefox.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/manage_IPhone_ImageFiles?db_file=ifm11_backup_20160110_080900.bk"

REM goto end


REM pause

:end
