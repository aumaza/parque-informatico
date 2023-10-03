#!/bin/bash

echo "# parque-informatico" >> README.md
echo "Sistema de gestión del Parque Informático" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/aumaza/parque-informatico.git
git push -u origin main