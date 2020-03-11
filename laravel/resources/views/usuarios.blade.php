<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lista de Usuários - Aprendendo Laravel</title>
  <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
  <style>
    *{
      margin:0;
      padding:0;
      box-sizing: border-box;
      text-decoration:none;
    }
    html{
      background:linear-gradient(coral, white) no-repeat;
      font-family: 'PT Sans', Arial;
    }
    header{
      width:100%;
      padding:10px;
      position:fixed;
      top:0;
      border-bottom:1px solid #f444;
      background-color:#fffe;
      box-shadow: 0px 3px 3px #f003;
    }
    header h1{
      background:url('https://www.mavenlogix.org/wp-content/uploads/2019/01/laravel-512-400x400.png') no-repeat;
      font-size:30px;
      padding-left:70px;
      line-height:50px;
      background-size:50px;
      color:#FF4B4B;
      width:80%;
      margin:0 auto;
    }
    header span{
      border-left:1px solid #f44;
      margin:0 15px;
    }
    header h1 a{
      font-size:16px;
      font-weight:normal;
      color:#f44;
    }
    main{
      border:1px solid #f44;
      border-radius:10px;
      box-shadow: 5px 5px 2px #f003;
      width:80%;
      margin:100px auto 0;
    }
    h2{
      font-size:25px;
      padding:30px 0;
      text-align:center;
      background-color:#f44;
      color:white;
      border-radius:10px 10px 0 0;
      border-top:1px solid white;
      text-transform: uppercase;
    }
    table{
      width:100%;
    }
    th, td{
      vertical-align: middle;
      text-align:left;
    }
    th{
      padding:10px 10px;
      background-color: #f443;
    }
    td{
      padding:20px 10px;
      font-size:22px;
    }

    td:nth-child(5), td:nth-child(6){
      width:60px;
      text-align:center;
      padding:0;
    }

    #editar, #deletar{
      display:block;
      width:40px;
      height:40px;
    }
    #editar{
      background:url('https://cdn.iconscout.com/icon/free/png-256/edit-1215-1163030.png') center no-repeat;
      background-size:contain;
    }
    #deletar{
      border:none;
      cursor: pointer;
      background:url('https://i.ya-webdesign.com/images/edit-delete-icon-png.png') center no-repeat;
      background-size:contain;
    }

    th:first-child, td:first-child{ width:1px; }
    tr:nth-child(2n){ background-color:#fff5; }
    tr:nth-child(2n+1){ background-color:#f442; }
    td:nth-child(2){ width:40%; }
    tr:last-child td {
        padding:5px;
        background-color:#f44;
        border-radius:0 0 10px 10px;
    }
    footer{
      text-align:center;
      padding:10px;
      margin-top:20px;
      font-size:14px;
      color:red;
      border-top:1px solid #f004;
    }
    footer a{
      color:red;
    }
    footer a:hover { text-decoration:underline; }
  </style>
</head>
<body>
  <header>
    <h1>Aprendendo Laravel<span></span><a href='usuarios'>home</a><span></span><a href='cadastrar'>cadastrar</a>
    </h1>
  </header>
  <main>
     <table cellspacing="0">
        <h2>Lista de Usuários</h2>
        <tr>
           <th>ID</th>
           <th>Nome</th>
           <th>E-mail</th>
           <th>Desde</th>
           <th colspan=2>Operação</th>
        </tr>

        <tr>
@foreach($users as $user)
           <td>{{ $user->id }}</td>
           <td>{{ $user->name }}</td>
           <td>{{ $user->email }}</td>
           <td>{{ date('d/m/Y', strtotime($user->created_at)) }}</td>
           <td><a href='editar/{{ $user->id }}' id='editar' title='Editar'></a></td>
           <td>
              <form action="delete/{{ $user->id }}" method="post">
              @csrf

              @method("delete")
                  <input id="deletar" type="submit" value="" title='Deletar'>
              </form>
           </td>
        </tr>
@endforeach
        <tr><td colspan='6'></td></tr>
    </table>
  </main>
  <footer>
    <p>Aprendendo Laravel - by Edson Luiz Parisotto - <a href='http://www.variavel.com.br/laravel'>www.variavel.com.br/laravel</a></p>
  </footer>
</body>
</html>
