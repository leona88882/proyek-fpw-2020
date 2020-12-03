<link rel="stylesheet" type="text/css" href="{{ asset('bootstrap.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('font-awesome.min.css')}}">
<head>
    <style>
        .kotak {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding-top: 0px;
        padding-left: 20px;
        padding-right: 0px;
        width: 40vw;
        height: fit-content;

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
        <h1 style="text-align: center">Insert Barang Baru</h1>
        <hr>
        <form action="/add_barang" method="post">
            @csrf
            @isset($supplier)
                <div class="row">
                    <div class="col-4">
                        <select name="sup" id="sup">
                            <option value="0" >--- Pilih Supllier ---</option>
                            @foreach ($supplier as $sup)
                            <option value="{{$sup->id_supplier}}">{{$sup->nama_supplier}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-7"><button class="button" style="padding: 5px 8px; width: 100%; color: white;" >Tambahkan Form</button><br></div> --}}
                </div>


            @endisset

            <hr>
            <div class="row" id="isi">
                <div class="col-3 col-sm-3">Nama Barang</div>
                <div class="col-3 col-sm-1">:</div>
                <div class="col-6 col-sm-7"><input type="text" name="nama_barang" id="" style="width: 100%"></div>
                <br>
                <br>
                <div class="col-3 col-sm-3">Jenis Barang</div>
                <div class="col-3 col-sm-1">:</div>
                <div  class="col-3 col-sm-7">
                    @isset($jenis)
                        <div>
                            <select name="jenis" id="jenis" style="width: 100%;">
                                <option value="0" >--- Pilih Jenis Barang ---</option>
                                @foreach ($jenis as $value)
                                <option value="{{$value->id_jenis}}">{{$value->jenis_barang}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endisset
                </div>

                <br>
                <br>
                <div class="col-3 col-sm-3">Jumlah Barang</div>
                <div class="col-3 col-sm-1">:</div>
                <div class="col-6 col-sm-7"><input type="number" name="jmlh_barang" id="" value="0" min="1" style="width: 100%"></div>
                <br>
                <br>
                <div class="col-3 col-sm-3">Harga Barang</div>
                <div class="col-3 col-sm-1">:</div>
                <div class="col-6 col-sm-7"><input type="number" name="harga_barang" id="" value="0" min="0" style="width: 100%"></div>
            </div>

            <br>

            <br>
            <input type="submit" value="Tambahkan" name="add" class="button">
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

<script>

</script>
