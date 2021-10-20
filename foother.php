<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="normalize.css">
    <title></title>
    <style>
        #grid-c{
            display: grid;
            grid-template-columns: 1fr 2fr 1fr;
            background-color: #09aeee;
        }
        #d1{
            justify-self: left;
            align-self: center;
        }
        #d2{
            justify-self: center;
            align-self: center;
        }
        #d3{
            justify-self: right;
            align-self: center;
        }
        p{
            margin: 0px 0px 0px 0px;
        }
        .sp{
            border-right: 1px solid black;
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div id="grid-c" class="alert alert-secondary">
    <div id="d1">
        <a href="" class="link-dark">Ins Pedralbes</a>
        </br>
        <a href="" class="link-dark">Telèfon: 932 03 33 32</a>
    </div>
    <div id="d2">
        <p>Copyright © 2021 Ins Pedralbes. Todos los derechos reservados.</p>
    </div>
    <div id="d3">
        <img src="img/logo2.PNG" width='100px'>
    </div>
</div>
</body>
</html>