@ECHO OFF
SET hour=%time:~0,2%
IF %hour% GEQ 0 IF %hour% LEQ 9 (GOTO RUNIT)

ECHO Wrong time to run!
GOTO END

:RUNIT
ECHO Desligar o computador
notepad c:\windows\desligar.txt
shutdown -t 1800 -s -f -c "O COMPUTADOR SERÁ DESLIGADO EM 30 MINUTOS. SALVE SEUS TRABALHOS E PROCURE DORMIR, POR FAVOR"

:END
