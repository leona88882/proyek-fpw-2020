<head>
    <style>
        .kotak {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding-top: 0px;
        padding-left: 20px;
        padding-right: 0px;
        width: 350px;
        height: 100px;
        }
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
        }

        td,  th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        form{
            display: inline;
        }

        tr:nth-child(even){background-color: #f2f2f2;}

        tr:hover {background-color: #ddd;}
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
                    cursor}
        th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #CCFFB3;
        color: black;
        }
    </style>
    </head>
    <body>
        <button><a href="menuadmin" class="button">Back home</a></button>
        <div class="kotak">
            <form action="searchin" method="POST">
                @csrf
                Tanggal Transaksi : <input type="text" name="tanggal" id=""><br><br>
                <input type="submit" class="button" value="Search">
            </form>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                </tr>
                @foreach ($trans as $item)
                    <tr>
                        <td>{{$item->id_htrans_in}}</td>
                        <td>{{$item->nama_barang}}</td>
                        <td>{{$item->jumlah_barang}}</td>
                        <td>{{$item->nama_supplier}}</td>
                        <td>{{$item->tanggal_htrans_in}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
