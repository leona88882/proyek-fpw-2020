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
    <form action="/checklogin" method="post">
        @csrf
    <h1 style="text-align: center">Login</h1>

    <br>Username:<input type="text" placeholder="Username" name="username">
    <br>Password:  <input type="password"  placeholder="Password" id="password" name="password">
    <br>
    <input type="submit" value="Login" class="button"><br>
    <a href="/register">Belum Punya Akun? Register sekarang</a><br>
    <span>{{$err}}</span>
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
