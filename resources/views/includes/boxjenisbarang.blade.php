<head>
    <style>
        .kotak {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding-top: 0px;
        padding-left: 20px;
        padding-right: 0px;
        width: 400px;
        height: 400px;

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

    <div class="kotak">
        <h1 style="text-align: center">Jenis Barang</h1>
        <form action="/olah_jenis_barang" method="post">
            @csrf
        Nama Jenis Barang : <input type="text" name="jenis_barang" id="">
        <input type="submit" value="Register Jenis" name="btnregis" class="button" id="submitku">
        <button class="button" ><a style ="color:white ;"href="/menuadmin">Kembali Ke admin</a></button><br>
    </form>


    @if($errors->any())
    <ul>
        @foreach($errors->all() as $e)
        <li>{{$e}}</li>
        @endforeach
    </ul>
    @endif

    </div>

    </body>

