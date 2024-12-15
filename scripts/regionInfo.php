<?php
header('Content-Type: text/html; charset=UTF-8');

// Відкриття файлу
$file = fopen("C:\\Users\\Admin\\my-firebase-clone\\scripts\\oblinfo.txt", "r");

// Перевірка на наявність файлу
if (!$file) {
    echo "<p>Не вдалося відкрити файл!</p>";
    exit;
}

// Зчитування кількості областей
$numRegions = fgets($file);

// Початок таблиці
$table = "<table border='1'>";
$table .= "<tr><th>Область</th><th>Населення (тис.)</th><th>ВНЗ</th></tr>";

// Читання даних про області
for ($i = 0; $i < $numRegions; $i++) {
    $region = trim(fgets($file));
    $population = trim(fgets($file));
    $universities = trim(fgets($file));

    // Проверка на конец файла
    if (!$region || !$population || !$universities) {
        break;
    }

    // Добавление строки в таблицу
    $table .= "<tr><td>$region</td><td>$population</td><td>$universities</td></tr>";
}

// Закриття таблиці і файлу
$table .= "</table>";
fclose($file);

// Повертаємо таблицю
echo $table;
?>
