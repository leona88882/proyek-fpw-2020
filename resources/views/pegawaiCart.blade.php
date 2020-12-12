<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai</title>
    <style>
        .product{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr 1fr  1fr;
            max-width: 500px;
        }
        .cart{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            max-width: 400px;
        }
        div {
        border: 1px solid #ddd;
        padding: 8px;
        }
        .button {
            border-radius: 25px;
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            }
    </style>
</head>
<body>
    @include('includes.header')
      <div class="container">
          <div class="product">
            <?php foreach ($barang as $c )
            {?>
                <div class="idbarang">
                    <?php echo $c->id_barang;?>
                </div>
                <div class="namabarang">
                    <?php echo $c->nama_barang;?>
                </div>
                <div class="namabarang">
                <?php echo $c->stock_barang;?>
             </div>
                <div class="harga"><?php echo $c->harga_barang;?></div>

                <div class="btn">
                    <form action="/addtocart" method="post">
                    @csrf
                    <input name="stocks" value="<?php echo $c->stock_barang;?>" type="hidden">
                <input name="id" value="<?php echo $c->id_barang;?>" type="hidden">
                <input  class="button" type="submit" value="Add to Cart"> </form></div>
        <?php }?>
          </div>
      </div>


<Br>
      <?php

        if((session('cart')))
        {
            $total = 0;
            ?>
            <div class="cart">

            @foreach(session('cart') as $key=>$value)

                @foreach($value as $keys=>$val)
            <div class="<?php echo $keys;?>">

                <?php echo $val;?>
            </div>

                @endforeach
                <div class="subtotal">
                    <?php $subtotal = $value['price'] * $value['quantity'];?>
                    {{$subtotal}}
                    <?php $total +=$subtotal?>
                </div>
            @endforeach
        </div>
        <form action="checkout" method="post">
            @csrf
            <input type="hidden" name="total" value="{{$total}}">

            <h1> Total  :  <span  value={{$total}}>{{$total}}</span>
                <h1>Pilih CUSTOMER</h1>
        <select name="cust">
            <?php foreach ($cust as $c )
            {?> <option value="<?php echo $c->username_user;?>"><?php echo $c->username_user;?></option>

             <?php }?>
             <input type="submit" value="Checkout">
           </select>
        </form>

        <?php }?>



</body>
</html>
