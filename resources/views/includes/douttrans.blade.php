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
        <button><a href="menuadmin" class="button">Back home</a></button>
        <div class="table">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
                @foreach ($result as $item)
                    <tr>
                        <td>{{$item->id_htrans_out}}</td>
                        <td>{{$item->tanggal_htrans_out}}</td>
                        <td><form action="htranspelangan" method="post">
                            @csrf
                            <input type="submit" value="Detail" class="button">
                            <input type="hidden" name="id" value="{{$item->id_htrans_out}}">
                        </form></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
