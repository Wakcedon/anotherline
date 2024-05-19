<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $token = '7059031380:AAEcv_TbIZwiwM4dyX84bbMmBzSKpWkOL7I';
    $chat_id = '5129694270'; // Замените на ваш chat ID
    $text = "Имя: $name\nEmail: $email\n\nСообщение:\n$message";

    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($text);

    // Проверка URL
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        echo "Недопустимый URL: $url";
        exit;
    }

    $response = file_get_contents($url);

    if ($response === false) {
        $error = error_get_last();
        echo "Ошибка при отправке запроса: " . $error['message'];
    } else {
        header("Location: thankyou.html");
        exit;
    }
} else {
    echo "Неверный метод запроса.";
}
?>
