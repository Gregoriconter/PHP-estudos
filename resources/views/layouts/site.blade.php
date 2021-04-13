<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='shortcut icon' href='http://localhost/imagens/favicon.ico'/ >
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
        <title>Inicio</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <style type="text/css">
            .darkmode_menu{
                background-color: #343a40;
            }

            body{
                background-color: #6c757d;
            }

            a, b, h1, h6, span{
                color: #fff;                
            }        

            .text-white a{
                color: #fff;
                display: block;
            }

            p.white{
                color: #fff;
            }

            td.text-table{
                padding-top: 20px;
                color: #fff;
            }
            
            .error{
                border-color: #dc3545;
            }

            .relative .z-0 svg{
                width: 40px;
            } 

            span.relative{
                box-shadow: 0 .0rem .0rem rgba(0,0,0,.075)!important;
            } 

             p.text-sm{
                width: 268px;
                margin-top: 1rem;
                margin-left: 80px;
            }

            div.flex-1{
                padding-left: 57px;
                padding-right: 57px;
            }

            .bg-white{
                background-color: #343a40!important;
                border: #2f3439!important;
                border-radius: .25rem;
            }

            .month,.year{
                color: black;
            }

            img{
                width: 100%;
            }

            span.circulo{
                width: 35px;
                height: 35px;
                margin-top: 7px;
                margin-left: 7px;
                padding-top: 4px;
                border: solid;
                border-width: 1px;
                border-radius: 25px;
                text-align: center;
                display: inline-block;
            }

            span.red{
                border-color: red;
            }

        </style>
    </head>
    <body id="app" class="antialiased">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark darkmode_menu">
              <a class="navbar-brand" href="{{url("/")}}">Navbar</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{url("/")}}">HOME <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url("contatos")}}">CONTATOS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('contatos/create')}}">ADICIONAR</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/tabuada')}}">TABUADA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/piramide')}}">PIRAMIDE</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/notas')}}">VERIFICAR APROVAÇÃO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('/numeros')}}">CONTAGEM DE NÚMEROS</a>
                  </li>
                </ul>
              </div>
            </nav>
        </header>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @yield('content')
        </div>
        <footer>
            <div class="navbar navbar-dark darkmode_menu text-left mt-5 px-5 py-3">
                <div class="col-md-2 col-sm-12 mt-5 mb-5">
                </div>
                <div class="col-md-4 col-sm-12 mt-5 mb-5">
                    <h6 class="text-white"><b>PÁGINAS</b></h6>
                    <hr>
                    <b class="text-white">
                        <a href="{{url("/")}}">- Home</a>
                        <a href="{{url("contatos")}}">- Contatos</a>
                        <a href="{{url('contatos/create')}}">- Adicionar contatos</a>
                        <a href="{{url('/tabuada')}}">- Tabuada</a>
                        <a href="{{url('/piramide')}}">- Piramide</a>
                    </b>
                </div>
                <div class="col-md-4 col-sm-12 mt-5 mb-5">
                    <h6 class="text-white"><b>CONTATO PESSOAL</b></h6>
                    <hr>
                    <b class="text-white">
                        <a href="#"><i class="fa fa-whatsapp"></i> (54) 991240338</a>    
                        <a href="#"><i class="material-icons">mail_outline</i>  gregori.conter@gmail.com</a>
                        <a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </b>
                </div>
                <div class="col-md-2 col-sm-12 mt-5 mb-5">
                </div>                                              
            </div>
        </footer>
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
        <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
        <script>
            $(document).ready(function(){
                var SPMaskBehavior = function (val) {
                return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

                $('.telefone').mask(SPMaskBehavior, spOptions);

                $.fn.datepicker.dates['pt-BR'] = {
                    days: ["Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado", "Domingo"],
                    daysShort: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sáb", "Dom"],
                    daysMin: ["Do", "Se", "Te", "Qu", "Qu", "Se", "Sa", "Do"],
                    months: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"],
                    monthsShort: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                    today: "Hoje",
                    clear: "Limpar"
                };

                $(".datepicker").datepicker({
                    format: "dd/mm/yyyy",
                    language: "pt-BR",
                    locale: "pt-BR"
                });
                

            });
        </script>
    </body>
</html>
