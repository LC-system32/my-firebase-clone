const express = require('express');
const { exec } = require('child_process');
const path = require('path');

const app = express();
const PORT = 80;
const HOST = 'lb3.zapto.org'; // Ваш статический локальный IP-адрес

// Раздача статических файлов из папки public
app.use(express.static(path.join(__dirname, 'public')));

// Маршрут для выполнения PHP-скрипта
app.get('/api/data', (req, res) => {
    exec('php C:\\Users\\Admin\\my-firebase-clone\\scripts\\regionInfo.php', (error, stdout, stderr) => {
        if (error) {
            console.error(`Ошибка выполнения PHP: ${stderr}`);
            res.status(500).send('<p>Помилка сервера</p>');
            return;
        }
        res.send(stdout); // Отправка HTML-контента от PHP клиенту
    });
});

// Запуск сервера на статическом IP
app.listen(PORT, () => {
    console.log(`Сервер запущено на http://${HOST}:${PORT}`);
});
