#!/usr/bin/env bash
# Serve prototype/ with the PHP built-in server from XAMPP.
# Usage: scripts/serve.sh [port]   then open http://localhost:8080/
# The document root is the current directory on purpose: passing a Windows
# path with Greek characters as an argument to php.exe gets garbled.
set -euo pipefail
cd "$(dirname "$0")/../prototype"
exec /mnt/c/xampp/php/php.exe -S "localhost:${1:-8080}"
