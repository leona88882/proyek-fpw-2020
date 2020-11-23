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
<h1>Control Pegawai</h1>
<button><a href="menuadmin" class="button">Back home</a></button>
<table index="1">
    <tr>

        <th>Username</th>
        <th>Action</th>
    </tr>
    @if(!is_null($result))
        @foreach($result as $key=>$temp)

        <tr>
        <td>
        {{$temp['username_user']}}
        </td>

        <td>
            <form action="softdelete" method="post">
                @csrf
            <input type="hidden" name="username" value="{{$temp['username_user']}}">
            <input type="submit" class="button" value="Delete">
            </form>
        <form action="detaileditpegawai" method="post">
            @csrf
            <input type="hidden" name="username" value="{{$temp['username_user']}}">
            <input type="submit" class="button"value="Edit">
            </form>



    </td>
</tr>
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

@endforeach
@endif
