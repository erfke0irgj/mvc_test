<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="flavicon.ico">
    <title>List</title>
</head>
<body>
    <table>
        <tr>
            <th></th>
            <th>ID</th>
            <th>ITEM 1</th>
            <th>ITEM 2</th>
        </tr>

        <!-- $rows from Model. 3 We just get the value as objects from the $rows and put them into HTML code -->
        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><a href="/delete?id=<?=$item->id?>">X</a></td>
            <td><?= $item->id ?></td>
            <td><a href="/form?id=<?=$item->id?>"><?= $item->item1 ?></a></td>
            <td><?= $item->item2 ?></td>
        </tr>
        <?php endforeach ?>

        <?php if(count($model->rows) == 0): ?>
            <tr>
                <td colspan="4">Nothing here.</td>
            </tr>
        <?php endif ?>
    </table>
</body>
</html>