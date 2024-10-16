<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<form id="currencyForm">
    <input type="text" name="name" placeholder="Kateqorya">
    <button type="submit">Əlavə et</button>
</form>

<script>
    $('#currencyForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('category/create') ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Kateqorya əlavə olundu');
            }
        });
    });
</script>
</body>
</html>