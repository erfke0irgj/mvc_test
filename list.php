<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>ITEM 1</th>
            <th>ITEM 2</th>
        </tr>

        <?php foreach($model->rows as $item): ?>
        <tr>
            <td><?= $item->id ?></td>
            <td><?= $item->item1 ?></td>
            <td><?= $item->item2 ?></td>
        <?php endforeach ?>
    </table>
</body>
</html>