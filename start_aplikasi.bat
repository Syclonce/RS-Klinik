@echo off
echo Current directory: %CD%

:: Delete existing log file if it exists and handle file access error
if exist "npm-log.txt" (
    echo Trying to delete npm-log.txt...
    del "npm-log.txt" >nul 2>&1
    if errorlevel 1 (
        echo Unable to delete npm-log.txt. It may be in use by another process.
        echo Please close any applications using it and try again.
        exit /b
    )
)

:: Check for vendor directory
if not exist "vendor" (
    echo Vendor directory not found. Installing Composer dependencies...
    composer install
) else (
    echo Vendor directory exists.
)

:: Check for node_modules directory
if not exist "node_modules" (
    echo node_modules directory not found. Installing NPM dependencies...
    npm install
) else (
    echo node_modules exists.
)

:: Run npm dev command and hide logs
start /B npm run dev > npm-log.txt 2>&1
set "npmProcessId=%ERRORLEVEL%"

:: Wait for a short moment to allow the servers to start
timeout /t 5 > NUL

:: Check for server messages in the log file
findstr /C:"Server running on [http://localhost:8000]" npm-log.txt >nul
set "server8000=%ERRORLEVEL%"

findstr /C:"Server berjalan pada port 3000" npm-log.txt >nul
set "server3000=%ERRORLEVEL%"

:: Display messages based on server status
if %server8000% equ 0 (
    echo Server running on port 8000.
) else (
    echo Server not found on port 8000.
)

if %server3000% equ 0 (
    echo Server running on port 3000.
) else (
    echo Server not found on port 3000.
)

echo.
echo Press any key to exit.

:: Wait for a key press
pause >nul

:: Stop the running npm process
taskkill /PID %npmProcessId% /F >nul 2>&1

echo Stopped running processes.
exit /b
