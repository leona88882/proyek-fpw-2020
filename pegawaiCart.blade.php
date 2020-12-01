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
            grid-template-columns: 1fr 1fr 1fr 1fr ;
            max-width: 400px;
        }
        .cart{
            display:grid;
            grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
            max-width: 400px;
        }
    </style>
</head>
<body>
   
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
                <div class="harga"><?php echo $c->harga_barang;?></div>
                <div class="btn"> <form action="/addtocart" method="post">@csrf <input name="id" value="<?php echo $c->id_barang;?>" type="hidden"><input type="submit" value="Add to Cart"> </form></div>
        <?php }?>
          </div>
      </div>
   
    
     
      <?php  
        if((session('cart')))
        {
            $total = 0;
            
            var_dump(session('cart'));
            ?>
            <div class="cart">
                
            @foreach(session('cart') as $key=>$value)
            <div class="idbarang">
                <?php echo $key?>
            </div>
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
        <h1> total: <?php echo $total;?>
        <?php }?>
        <h1>Pilih CUSTOMER</h1>
        <select name="cust">
            <?php foreach ($cust as $c )
            {?> <option value="<?php echo $c->username_user;?>"><?php echo $c->username_user;?></option>
            
             <?php }?>
           </select>
     
</body>
</html>