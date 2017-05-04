Проект по курсу PHP-2. Музыкальная группа.
==========================================

Проект реализован на фреймворке Laravel.

Сайт реализует возможности:
* Главная страница с кратким описанием группы
* Биография группы
* Альбомы и песни группы
* Фотографии группы
* Админ-панель

Созданы Eloquent модели:
* App\Album https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/app/Album.php
* App\Song https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/app/Song.php
* App\Photo https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/app/Photo.php

Созданы контроллеры:
* App\Http\Controllers\IndexController https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/app/Http/Controllers/IndexController.php
* App\Http\Controllers\AdminController https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/app/Http/Controllers/AdminController.php

Созданы миграции:
* CreateSongsTable https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/database/migrations/2017_04_21_080257_create_songs_table.php
* CreateAlbumTable https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/database/migrations/2017_04_23_073212_create_albums_table.php
* CreatePhotosTable https://github.com/xxIlyaxx/PHP-2-project-work/blob/master/database/migrations/2017_05_01_104041_create_photos_table.php

Для форматирования описания и биографии группы используется Markdown парсер.
