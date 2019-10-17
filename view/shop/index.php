<!DOCTYPE HTML>
<html>
<style>
    .box {
        border: 1px solid black;
        margin: 10px auto 0px auto;
        padding: 10px;
    }
</style>

<body>
    <?php
    $cart = Session::getSession('cart');
    ?>
    <div class="box">

        User Name: <?php echo Session::getSession('user')['name']; ?>
        <a href="/site/logout"><button>Logout</button></a>
    </div>
    <div class="box">
        Apple : <input type="number" id="numberApples" name="numberApples" value="<?php echo ($cart) ? $cart->getQuantity(1) : '0' ?>"><br>
        Orange : <input type="number" id="numberOranges" name="numberOranges" value="<?php echo ($cart) ? $cart->getQuantity(2) : '0' ?>"><br>

        <button type="button" onclick="loadDoc()"> Add Cart </button>
        <a href="/cart"><button>Go to cart detail</button></a>
    </div>
    <div class="box">
        <b>Total Price</b>
        <p id="totalPrice">$<?php echo ($cart) ? $cart->calculatorOrder() : 0; ?></p>
    </div>

</body>
<script>
    function loadDoc() {
        var xhttp = new XMLHttpRequest();
        var numberApples = document.getElementById('numberApples').value;
        var numberOranges = document.getElementById('numberOranges').value;

        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("totalPrice").innerHTML = '$' + this.responseText;
            }
        };
        xhttp.open("POST", "/product/addCart", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("numberApples=" + numberApples + "&numberOranges=" + numberOranges);
    }
</script>

</html>