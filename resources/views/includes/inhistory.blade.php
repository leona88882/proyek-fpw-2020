<head>
    <style>
        .kotak {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding-top: 0px;
        padding-left: 20px;
        padding-right: 0px;
        width: 350px;
        height: 450px;

    }
    .button {
            border-radius: 25px;
            background-color: #4CAF50;
            border: none;
            color: white;
            width: 300px;
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
        <div class="tabel">
            <table border="1">
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
