<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    $id = 0;
    $name = '';
    $cost = 0;
    $img = '';

    $file = file_get_contents('data.json');
    $item = json_decode($file, true);

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $id = $_GET['id'];
        $img = $item[$id]['img'];
        $name = $item[$id]['name'];
        $cost = $item[$id]['cost'];

    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $item[$id]['img'] = $_POST['img'];
        $item[$id]['name'] = $_POST['name'];
        $item[$id]['cost'] = $_POST['cost'];
        file_put_contents('data.json', json_encode($item));
    }
    unset($file);
    ?>

     <form method="POST" action="update.php?id=<?= $id ?>">
        Название продукта: <input type="text" name="name" value="<?= $name ?>"/><br />
        Стоимость продукта: <input type="number" name="cost" value="<?= $cost ?>" /><br />
        Ссылка на изображение: <input type="text" name="img" value="<?= $img ?>" /><br />
        <input type="hidden" value="<?= $id ?>" name="id"/>
        <input type="submit" value="Сохранить" />
    </form>
</body>

</html>