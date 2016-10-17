@echo off

echo changing to... C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11
REM pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11 && java -cp ".;lib/data/java/*"  MyTest_iPhone
pushd C:\WORKS_2\WS\Eclipse_Luna\Cake_IFM11

echo changing names...
java -cp ".;lib/data/java/*"  MyTest_iPhone

pause
