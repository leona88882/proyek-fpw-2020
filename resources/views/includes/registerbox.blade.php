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
        <h1 style="text-align: center">Register</h1>
        <form action="/olah_regis" method="post">
            @csrf
        <br>Username : <input type="text" name="username_user" id="">
        <br>Password:  <input type="text"   name="password_user" >
        <br>Confirm Password:  <input type="text"  name="password_user_confirmation" >
        <br>Tipe user  <select name="jenis_user" id="">
            <option value="0">Pelanggan</option>
            <option value="1">pegawai</option>
            </select>
        <br>
        <input type="hidden" name="status_delete_user" value="0">
        <input type="submit" value="Register" name="btnregis" class="button" id="submitku">
        <button class="button" ><a style ="color:white ;"href="/">Login</a></button><br>
    </form>
    <span style="color: red">{{$err}}</span>

    @if($errors->any())
    <ul>
        @foreach($errors->all() as $e)
        <li>{{$e}}</li>
        @endforeach
    </ul>
    @endif

    </div>

    </body>

