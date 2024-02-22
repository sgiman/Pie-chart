<?php
//=======================================================================
// File:        JPG-CONFIG.INC
// Description: Configuration file for JpGraph library
// Created:     2004-03-27
// Ver:         $Id: jpg-config.inc.php 1871 2009-09-29 05:56:39Z ljp $
//
// Copyright (c) Asial Corporation. All rights reserved.
//========================================================================
// Modified by sgiman @ 2023-10

//------------------------------------------------------------------------
// Каталоги для кеша и каталог шрифтов.
//
// CACHE_DIR:
// Полное абсолютное имя каталога, который будет использоваться для хранения
// кэшированные файлы изображений. Этот каталог не будет использоваться, если USE_CACHE
// определение (далее вниз) имеет значение false. Если вы включите кеш, обратите внимание, что
// этот каталог ДОЛЖЕН быть доступен для чтения и записи для процесса, выполняющего PHP.
// Должен заканчиваться на '/'
//
// TTF_DIR:
// Каталог, в котором можно найти шрифты TTF. Должен заканчиваться на '/'
//
// Значения по умолчанию, используемые, если эти определения оставлены закомментированными:
//
// UNIX:
//   CACHE_DIR /tmp/jpgraph_cache/
//   TTF_DIR   /usr/share/fonts/truetype/
//   MBTTF_DIR /usr/share/fonts/truetype/
//
// WINDOWS:
//   CACHE_DIR $SERVER_TEMP/jpgraph_cache/
//   TTF_DIR   $SERVER_SYSTEMROOT/fonts/
//   MBTTF_DIR $SERVER_SYSTEMROOT/fonts/
//
//------------------------------------------------------------------------
// define('CACHE_DIR','/tmp/jpgraph_cache/');
// define('TTF_DIR','/usr/share/fonts/TrueType/');
// define('MBTTF_DIR','/usr/share/fonts/TrueType/');

//-------------------------------------------------------------------------
// Спецификация каталога кэша для использования с графами CSIM, которые
// используем кэш.
// Каталог должен быть именем файловой системы, видимым PHP
// и версия 'http' должна находиться в том же каталоге, но как
// видимый HTTP-сервером относительно ddirectory 'htdocs'.
// Если указан относительный путь, он считается относительным, откуда
// скрипт изображения выполняется.
// Примечание. По умолчанию создается подкаталог в
// каталог, из которого выполняется скрипт изображения и хранятся все файлы
// там. Как обычно, этот каталог должен быть доступен для записи процессу PHP.
define('CSIMCACHE_DIR','csimcache/');
define('CSIMCACHE_HTTP_DIR','csimcache/');

//------------------------------------------------------------------------
// Различные настройки JpGraph. Отрегулируйте соответственно вашему
// предпочтения. Обратите внимание, что функциональность кэша отключена
// по умолчанию (включите, установив для USE_CACHE значение true)
//------------------------------------------------------------------------

// Язык по умолчанию для сообщений об ошибках.
// This defaults to English = 'en'
define('DEFAULT_ERR_LOCALE','en');

// Графический формат по умолчанию установлен на «авто», который будет автоматически
// выбираем лучший доступный формат в порядке png,gif,jpeg
// (Поддерживаемый формат зависит от того, что поддерживает ваша установка PHP)
define('DEFAULT_GFORMAT','auto');

// Стоит ли вообще использовать кеш? Установив для этого значения false no
// файлы будут созданы в каталоге кэша.
// Отличие от READ_CACHE в том, что для READ_CACHE установлено значение
// false все равно создаст изображение в каталоге кеша
// просто не использовать его. При установке USE_CACHE=false файлы даже не будут
// генерироваться в каталоге кэша.
define('USE_CACHE',false);

// Должны ли мы попытаться найти изображение в кеше перед его созданием?
// Установите для этого определения значение false, чтобы обойти чтение кеша и всегда
// регенерируем изображение. Обратите внимание, что даже если чтение кэша
// отключено, кэшированные данные все равно будут обновляться вновь сгенерированными
// изображение. Установите также «USE_CACHE» ниже.
define('READ_CACHE',true);

// Определить, должен ли обработчик ошибок быть основан на изображении или чисто
// на основе текста. На основе изображений это упрощается, поскольку сценарий будет
// всегда возвращаем изображение, даже в случае ошибок.
define('USE_IMAGE_ERROR_HANDLER',true);

// Должна ли библиотека проверить глобальную строку php_errmsg и преобразовать
// любая ошибка в нем графическое представление. Это удобно для
// случаев, когда, например, файлы заголовков не могут быть найдены, и это приводит к
// граф не создается и будет видно только изображение «красного креста».
// Это должно быть отключено для рабочего сайта.
define('CATCH_PHPERRMSG',true);

// Определить, должна ли библиотека также установить PHP по умолчанию
// обработчик ошибок для генерации графического сообщения об ошибке. Это полезно
// во время разработки, чтобы увидеть сообщение об ошибке в виде изображения
// вместо этого как «красный крест» на странице, где ожидается изображение.
define('INSTALL_PHP_ERR_HANDLER',false);

// Должно ли использование устаревших функций и параметров вызывать фатальную ошибку?
// (Полезно проверить, готов ли код к будущему.)
define('ERR_DEPRECATED',true);

// Встроенная функция GD imagettfbbox(), которая вычисляет ограничивающую рамку для
// текст, использующий шрифты TTF, содержит ошибки. Установив для этого определения значение true, библиотека
// использует собственную компенсацию этой ошибки. Однако это даст
// немного другой визуальный вид, чем если бы эта компенсация не использовалась.
// Включение этой компенсации, как правило, дает тексту немного больше места для большего количества
// действительно отражает фактическую ограничивающую рамку, которая немного больше, чем то, что
// Функция GD думает.
define('USE_LIBRARY_IMAGETTFBBOX',true);

//------------------------------------------------------------------------
// Следующие константы следует менять редко!
//------------------------------------------------------------------------

// К какой группе должен принадлежать кэшированный файл
// (Установив значение '', вы получите группу по умолчанию для 'PHP-пользователя')
// Обратите внимание, что пользователь Apache должен быть членом
// указанная группа, т.к. иначе для Apache это невозможно
// для установки указанной группы.
define('CACHE_FILE_GROUP','www');

// Какие разрешения должен иметь кешированный файл
// (Установив значение '', для 'PHP-пользователя' будут предоставлены разрешения по умолчанию)
define('CACHE_FILE_MOD',0664);

// Default theme class name
define('DEFAULT_THEME_CLASS', 'UniversalTheme');

define('SUPERSAMPLING', true);
define('SUPERSAMPLING_SCALE', 1);

?>