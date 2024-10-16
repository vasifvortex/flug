<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Payment</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Create Payment</h1>
    <form id="paymentForm">
        <input type="text" name="amount" placeholder="Amount" required>
        <select name="type" required>
            <option value="income">Income</option>
            <option value="expense">Expense</option>
        </select>
        <input type="text" name="comment" placeholder="Comment">
        <input type="text" name="category_id" placeholder="Category ID" required>
        <input type="text" name="currency_id" placeholder="Currency ID" required>
        <input type="text" name="user_id" placeholder="User ID" required> <!-- or use session data -->
        <button type="submit">Əlavə et</button>
    </form>

    <script>
        $('#paymentForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: 'http://localhost/flug/index.php/payment/create',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    let res = JSON.parse(response);
                    alert(res.message);
                }
            });
        });
    </script>
</body>
</html>
