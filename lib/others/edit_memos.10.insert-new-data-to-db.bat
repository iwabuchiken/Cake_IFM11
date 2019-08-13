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

	start launcher.exe "http://localhost/Eclipse_Luna/Cake_IFM11/images/manage_IPhone_ImageFiles?db_file=ifm11_backup_20160110_080900.bk"
	start launcher.exe http://benfranklin.chips.jp/cake_apps/Cake_IFM11/images/index_2

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
