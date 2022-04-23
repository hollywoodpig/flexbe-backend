## Что это?
* Rest API бэкенд на Laravel Lumen для приложения "Cписок желаний"
* Возможности:
    * Атрибуты элемента: имя, цена и дата создания
    * Получение списка элементов
    * Редактирование элемента
    * Пометка элемента как "приобретенный"
    * Архивирование и разархивирование элемента без возможности изменения его атрибутов
    * Удаление элемента

## Установка приложения
* `composer install`
* Переименуйте `.env.example` в `.env`
* Создайте файл `database.sqlite` внутри папки `database`
* `php artisan migrate`
* `php artisan key:generate`
* `php -S localhost:8000 -t public`

## Тестирование API
* Все маршруты находятся в `routes/web.php`
* Контроллер находится в `Http/Controllers/ItemController.php`
* Создание фейковых элементов:
    * `php artisan tinker`
    * `App\Models\Item::factory()->count(10)->create()`
