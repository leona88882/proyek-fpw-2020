<head>
    <style>
        .kotak {
        border-radius: 25px;
        border: 2px solid #73AD21;
        padding-top: 0px;
        padding-left: 20px;
        padding-right: 0px;
        width: 300px;
        height: 250px;

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
        <form action="/olaheditpegawai" method="post">
            @csrf
        <h1 style="text-align: center">Edit Pegawai</h1>
        @foreach($result as $key=>$temp)
        Current Username : {{$temp['username_user']}}
        <br>New Username:<input type="text" placeholder="username" name="username_user">
        <br>old Password:  <input type="text"  placeholder="old Password" id="old_password" name="old_password">
        <br>new Password:  <input type="text"  placeholder="Password" id="password_user" name="password">
        <input type="hidden" name="username" value="{{$temp['username_user']}}">
        @endforeach
        <br>
        <input type="submit" value="Edit" class="button"><br>
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
