@include('includes.header')
<head>
    <style>
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
        <button><a href="historypelanggan" class="button">Back home</a></button>
        <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Nama Pegawai</th>
                    <th>Nama Pelanggan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
                @foreach ($trans as $item)
                    <tr>
                        <td>{{$item->id_htrans_out}}</td>
                        <td>{{$item->nama_barang}}</td>
                        <td>{{$item->username_pegawai}}</td>
                        <td>{{$item->username_pelanggan}}</td>
                        <td>{{$item->jumlah_barang}}</td>
                        <td>{{$item->total_harga}}</td>
                        <td>{{$item->tanggal_htrans_out}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
