<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">

        <form class="form" enctype="multipart/form-data" action="api/client" method="post">
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="text-danger" for="name">Nome </label>
                    <input name="name" class="form-control" id="name" value="thiago" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label class="text-danger" for="email">E-mail </label>
                    <input name="email" class="form-control" id="email" value="thiagogaleno1301@hotmail.com" type="email">
                </div>
                <div class="form-group col-md-4">
                    <label class="text-danger" for="phone">Telefone </label>
                    <input name="phone" class="form-control" id="phone" value="6199990000" type="text">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label class="text-danger" for="country">País </label>
                    <input name="address[country]" class="form-control" id="country" value="Brasil" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label class="text-danger" for="state">Estado </label>
                    <select class="form-control" name="address[state]" id="state">
                        @foreach(arrayStates() as $key => $state)
                        <option value="{{ $key }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label class="text-danger" for="city">Cidades </label>
                    <select class="form-control" name="address[city]" id="city">
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label class="text-danger" for="neighborhood">Bairro </label>
                    <input name="address[neighborhood]" class="form-control" id="neighborhood" value="Weissopolis" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label class="text-danger" for="street">Endereço/Rua </label>
                    <input name="address[street]" class="form-control" id="street" value="Rua Rio Itaqui" type="text">
                </div>
                <div class="form-group col-md-4">
                    <label class="text-danger" for="number">Número </label>
                    <input name="address[number]" class="form-control" id="number" value="31" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="curriculo">Curriculo (pdf, doc, docx ou txt)</label>
                    <input type="file" name="curriculo" id="curriculo">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                </div>
                <div class="form-group col-md-4">
                    <button class="btn btn-block btn-danger" type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
<script>
    $(document).ready(function(){
        $('#state').on('change', function(){
            const state = $('#state option:selected').val()
            $.ajax({
                url: "https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+state+"/distritos",
                success: function(cities){
                    const options = $('#city')
                    options.empty()
                    $.each(cities, function(index, el){
                        options.append("<option value="+el.nome+">"+el.nome+"</option>")
                    })
                }
            })
        })

        $('form').submit(function(e){
            e.preventDefault();
            const data = $('form').serialize();
            $.ajax({
                url: "api/client",
                data: data,
                success: function(data){
                    console.log(data);
                }
            })
        })

    })
</script>
<style>
    .form{
        margin-top: 30px;
    }
</style>
</html>
