## Aliases no ~/.bashrc do Linux Mint 20

Para agilizar o trabalho nas tarefas mais frequentemente usadas

No windows podemos converter em arquivos .bat

nano .bashrc
```php
alias cw='cd /backup/www/laravel'
alias cpu='cd /backup/backup_github/public'
alias cpr='cd /backup/backup_github/private'
alias cdocs='cd /backup/backup_github/public/docs_source'
alias af='php artisan migrate:fresh'
alias am='php artisan migrate'
alias as='php artisan serve'
alias ams='composer du;php artisan migrate --seed'
alias asd='composer du;php artisan db:seed'
alias at='php artisan tinker'
alias auth7='composer require laravel/ui --dev;php artisan ui bootstrap --auth;npm install && npm run dev;npm audit fix'
alias clearall='php artisan view:clear;php artisan cache:clear;php artisan route:cache;php artisan route:clear;php artisan optimize;php artisan config:cache;composer dumpautoload'
```
