<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment View</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<table border="1">
    <tr>
        <th>Müştəri Adı</th>
        <th>Kateqoriya</th>
        <th>Məbləğ</th>
        <th>Valyuta</th>
        <th>Rəy</th>
       
    </tr>
    <?php foreach ($payment as $payment1): ?>
        <tr>
            <td><?= $payment1['user_name'] ?></td>
            <td><?= $payment1['category_name'] ?></td>
            <td><?= $payment1['amount'] ?></td>
            <td><?= $payment1['currency_name'] ?></td>
            <td><?= $payment1['comment'] ?></td>
          

        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>