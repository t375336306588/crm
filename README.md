# Клонируйте репозиторий
git clone https://github.com/t375336306588/crm.git
cd crm

# Установите зависимости
composer install
npm install && npm run build

# Создайте файл окружения и сгенерируйте ключ
cp .env.example .env
php artisan key:generate


# Настройка БД
php artisan migrate --seed

# Запуск сервера
php artisan serve

# Логин /login
Менеджер - admin@example.com, password
Пользователь - test@example.com, password

# Выход /logout
