<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Payment Filter</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<form id="filterForm">
    <input type="text" name="start_date" placeholder="Başlanğıc tarix">
    <input type="text" name="end_date" placeholder="Bitmə tarixi">

    <select name="category_id">
        <option value="">Bütün kateqoriyalar</option>
        <?php foreach ($category as $category1): ?>
            <option value="<?= $category1['id'] ?>"><?= $category1['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="user_id">
        <option value="">Bütün müştərilər</option>
        <?php foreach ($user as $user1): ?>
            <option value="<?= $user1['id'] ?>"><?= $user1['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <select name="currency_id">
        <option value="">Bütün valyutalar</option>
        <?php foreach ($currency as $currency1): ?>
            <option value="<?= $currency1['id'] ?>"><?= $currency1['name'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Filtrlə</button>
</form>

<div id="paymentTable">
    <!-- AJAX ilə gələn nəticələr burada göstəriləcək -->
</div>

<script>
    $('#filterForm').submit(function(e) {
        e.preventDefault(); // Səhifənin yenilənməsinin qarşısını alırıq

        $.ajax({
            url: '<?= base_url('payment/filter') ?>',
            type: 'POST',
            data: $(this).serialize(), 
            success: function(response) {
                $('#paymentTable').html(response); 
            },
            error: function() {
                alert('Filterləmə zamanı xəta baş verdi');
            }
        });
    });
</script>
</body>
</html>