<?php
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12">
                
                <div class="jumbotron">
                    <div class="container">
                        <h1>Conversão</h1>
                        <p>Informe o valor abaixo.</p>
                        
                        <input type="text" name="number" class="form-control" data-affixes-stay="true" data-prefix="R$ " data-thousands="." data-decimal=",">
                        
                        <br>
                        
                        <div id="cheque">
                            <div class="row" id="cab">
                                <div class="col-md-2">Comp <br> <span>321</span></div>
                                <div class="col-md-2">Banco <br> <span>x01</span></div>
                                <div class="col-md-2">Agência <br> <span>1234-5</span></div>
                                <div class="col-md-3">Conta <br> <span>098765-4</span></div>
                                <div class="col-md-1">c3 <br> <span>2</span></div>
                                <div class="col-md-2">R$ <br> <span id="value">124,75</span></div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="bbot">
                                        Pague por este <br>
                                        cheque a quantia de
                                        <span id="extenso"></span>
                                    </p>
                                    <p class="bbot">
                                        a
                                        <span id=""> <strong> Joab Queiroz Bandeira </strong> </span>
                                    </p>
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="img/bank_test.png" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-5 offset-md-3">
                                    <p class="bbot" id="data">
                                        São Paulo - <?= strftime('%A, %d de %B de %Y', strtotime('today')); ?>
                                    </p>
                                    <br>
                                    <p class="btop" align="center">
                                        Joab Queiroz Bandeira <br>
                                        CPF: 987.654.321-0
                                    </p>
                                </div>
                            </div>
                            
                        </div>
                        
                        <p align="center" id="preview"></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script type="text/javascript">
        $('input[name="number"]').maskMoney();
        $('input[name="number"]').on('keyup', function(){
            
            if($(this).val() != ''){
                var preview = $('#extenso');
                var value = $(this).val().replace('R$ ', '');
                $('#value').html(value);
                $.ajax({
                    type: 'post',
                    url: "Extenso.php",
                    data: {
                        numb: $(this).val()
                    },
                    beforeSend: function () {
                        preview.html('<i class="fas fa-sync fa-spin"></i>');
                    },
                    success: function(result){
                        preview.html(result);
                    }
                });
            }else{
                preview.html('');
            }
            
        });
    </script>
</body>
</html>