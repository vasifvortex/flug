<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<form id="userForm">
    <input type="text" name="name" placeholder="Müştəri Adı" required>
    <input type="text" name="phone" placeholder="Telefon Nömrəsi" required>
    <button type="submit">Əlavə et</button>
</form>

<script>
    $('#userForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('user/create') ?>',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                alert('Müştəri əlavə olundu');
            }
        });
    });
</script>
</body>
</html>