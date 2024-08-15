run:
	npm run dev
serve:
	php artisan serve
clear:
	php artisan optimize:clear && php artisan cache:clear && php artisan route:clear && php artisan config:clear && php artisan view:clear
