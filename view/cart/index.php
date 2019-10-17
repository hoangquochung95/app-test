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
        Apple : <?php echo ($cart) ? $cart->getProduct(1)['name'] : '' ?> <br>
        Price : $<?php echo ($cart) ?  $cart->getProduct(1)['price'] : 0 ?><br>
        Quantity : <?php echo ($cart) ?  $cart->getQuantity(1) : 0 ?><br>
        <br>
        Orange : <?php echo ($cart) ? $cart->getProduct(2)['name'] : '' ?><br>
        Price : $<?php echo ($cart) ?  $cart->getProduct(2)['price'] : 0 ?><br>
        Quantity : <?php echo ($cart) ?  $cart->getQuantity(2) : 0 ?><br>
        <hr>
        TotalPrice : $<?php echo ($cart) ? $cart->calculatorOrder() : 0 ?>
        <a href="/product"><button>Go to product</button></a>
    </div>
</body>


</html>