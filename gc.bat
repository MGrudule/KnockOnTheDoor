@if "%1"=="" echo no message & goto END
git commit -m "%*"
:END
