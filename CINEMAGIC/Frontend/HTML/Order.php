<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Booking</title>
    <style>body {
    font-family: Arial, sans-serif;
    background-color: #2e2e2e;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    color:white;
}

.container {
    background-color: #1e1e1e;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    border-radius: 5px;
    overflow: hidden;
    color:white;
}

.cart-header {
    background-color: red;
    color: white;
    padding: 10px;
    text-align: center;
    font-size: 1.2em;
    font-weight: bold;

}

.cart-header span {
    display: block;
    font-size: 0.8em;
    color: white;
}

.cart-details {
    padding: 15px;
    border-bottom: 1px solid #ccc;
    color: white;
}

.cart-details p {
    margin: 0 0 10px;
    color: white;
}


.buttons {
    display: flex;
    justify-content: space-between;
    padding: 15px;
    background-color: rgb(0, 0, 0);
    color: white;
    border: none;
    box-shadow: none;
   
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    color: black;
    background-color: rgb(215, 35, 35);
    border: none;
    box-shadow: none;

}

.btn.confirm {
    background-color: #ff0000;
    color: white;
}

.btn.cancel {
    background-color: #ccc;
    color: white;
}



</style>
</head>
<body>
    <div class="container">
        <div class="cart-header">
            YOUR CART
            <span>...almost there, just one click away.</span>
        </div>
        <div class="cart-details">
            <p>Cinema: CineMagic</p>
            <p>Theater Number: Theater 1</p>
            <p>Movie: Inception</p>
            <p>Category: 1.0</p>
            <p>Show Time: 2024-06-15 14:00:00</p>
        </div>
        
        <div class="buttons">
            <button id="confirm-order" class="btn confirm">CONFIRM ORDER</button>
            <button id="cancel-order" class="btn cancel">CANCEL</button>
        </div>
    </div>
    <script >
        document.getElementById('confirm-order').addEventListener('click', function() {
    alert('Order confirmed!');
});

document.getElementById('cancel-order').addEventListener('click', function() {
    alert('Order cancelled!');
});

    </script>
</body>
</html>
