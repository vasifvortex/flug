<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Currency</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<form id="currencyForm">
    <input type="text" name="name" placeholder="Valyuta Adı">
    <button type="submit">Əlavə et</button>
</form>

<script>
    $('#currencyForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('currency/create') ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Valyuta əlavə olundu');
            }
        });
    });
</script>
</body>
</html>