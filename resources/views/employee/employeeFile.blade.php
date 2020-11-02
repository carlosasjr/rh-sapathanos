<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Ficha do Funcionário</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="jumbotron text-center">
        <h1>Ficha do Funcionário</h1>
        <h3> {{ $employee->name }}</h3>
    </div>


    <p><strong>CPF:</strong> {{ $employee->cpf }}</p>
    <p><strong>RG:</strong> {{ $employee->rg }}</p>
    <p><strong>Data de Aniversário:</strong> {{ $employee->date_birth }}</p>
    <br>
    <hr>

    <h5>Endereço</h5>
    <p><strong>Rua:</strong> {{ $employee->street }} - {{ $employee->number }}</p>
    <p><strong>Bairro:</strong> {{ $employee->district }} - {{ $employee->complement }}</p>
    <p><strong>Cidade:</strong> {{ $employee->city }} / {{ $employee->state }}</p>
    <p><strong>CEP:</strong> {{ $employee->cep }} / {{ $employee->country }}</p>


    <hr>

    <h5>Outras informações</h5>
    <p>{{ $employee->observation }}</p>


    <hr>

    <h5>Para uso da Empresa</h5>
    <p><strong>Admissão:</strong> {{ $employee->admission }} - <strong>Demissão:</strong> {{ $employee->resignation }}
    </p>
    <p><strong>Salário:</strong>{{ $employee->salary }}</p>
    <p><strong>Hora:</strong>{{ $employee->hours }}</p>
    <p></p>


</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
