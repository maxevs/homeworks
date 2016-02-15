<p>8. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и
    добавить его. Все добавленные комментарии выводятся над текстовым полем. Реализовать
    проверку на наличие в тексте запрещенных слов, матов. При наличии таких слов - выводить
    сообщение "Некорректный комментарий". Реализовать удаление из комментария всех тегов,
    кроме тега &lt;b&gt;.
</p>

<?php
if (!is_file('otzyvy.txt')) {
    echo "Поки що немає відгуків, Ваш буде першим! <br />";
    $file = fopen('otzyvy.txt', 'a+');//щоб не генерувало помилку, створюємо файл
}
elseif (isset($_POST['textar']) && $_POST['textar']) {
    $file = fopen('otzyvy.txt', 'a+');//дублюємо строку так як тут інша умова
    $text = strip_tags($_POST['textar'], '<b>');

    $pozition = strpos($text, 'хуй');
    $pozition_1 = strpos($text, 'пизд');
    if ($pozition || $pozition === 0 || $pozition_1 || $pozition_1 === 0){
        die ("Некорректный комментарий");
    }
    $new_otzyvy = fwrite($file, $text.PHP_EOL);
    $arr = file('otzyvy.txt');//перетворюємо файл у масив щоб потім було зручніше виводити його елементи
    foreach ($arr as $key => $item) {
        $key_1 = $key + 1;//це для візуалбної нумерації відгуків
        echo "Відгук {$key_1}: {$item} <br /><br />";
    }
}
else {
    echo 'Щоб відправити відгук, потрібно заповнити поле форми!!!';
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Задача 8</title>
</head>
<body>
<form action="" method="post">
    <textarea name="textar" placeholder="Введіть свій коментарій"></textarea>
    <br />
    <input type="submit" value="Відправити">
</form>
<br />
<br />
</body>
</html>


