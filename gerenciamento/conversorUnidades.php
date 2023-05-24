<?php
    
?>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

<body>
    <div class="titulo">Conversor de Unidades</div>
    <div class="row">
        <div class="form-group col-md-6">
            <label>Unidades</label>
            <select class="form-select" name="metodo" id="tipoUnidade">
                <option value="kilo-joule">kWh -> J</option>
                <option value="joule-kilo">J -> kWh</option>
                <option value="caloria-joule">cal -> J</option>
                <option value="joule-caloria">J -> cal</option>
                <option value="kilo-caloria">kWh -> cal</option> 
                <option value="caloria-kilo">cal -> kWh</option>
                <option value="BTU-joule">BTU -> J</option> 
                <option value="joule-BTU">J -> BTU</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="nome">Entrada</label>
            <input type="text" class="form-control" min="0" id="inputValor">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label id="labelValorFinal" for="nome"></label>
        </div>
        <div class="form-group col-md-6">
        </div>
    </div>
    
    <button class="btn btn-primary btn-exercicio" id="calcular">Enviar</button>
<body>

<script>

    $(document).ready(function(){
    
    });

    $("#calcular").click(function(){
        var unidadeInicial = unidadeFinal = '';
        var tipoUnidade = $("#tipoUnidade option:selected").val();
        var entrada     = parseFloat(removeCaracteres(document.getElementById("inputValor").value));

        if(tipoUnidade == 'kilo-joule'){
            resultado      = entrada * (3.6 * (10**6));
            unidadeInicial = 'kWh';
            unidadeFinal   = 'J';
        }
        else if(tipoUnidade == 'joule-kilo'){
            resultado = entrada / (3.6 * (10**6));
            unidadeInicial = 'J';
            unidadeFinal   = 'kWh';
        }
        else if(tipoUnidade == 'caloria-joule'){
            resultado = entrada * 4.18;
            unidadeInicial = 'cal';
            unidadeFinal   = 'J';
        }
        else if(tipoUnidade == 'joule-caloria'){
            resultado = 1/(entrada / 4.18);
            unidadeInicial = 'J';
            unidadeFinal   = 'cal';
        }
        else if(tipoUnidade == 'kilo-caloria'){
            resultado = entrada * 860421;
            unidadeInicial = 'kWh';
            unidadeFinal   = 'cal';
        }
        else if(tipoUnidade == 'caloria-kilo'){
            resultado = entrada / 860421;
            unidadeInicial = 'cal';
            unidadeFinal   = 'kWh';
        }
        else if(tipoUnidade == 'BTU-joule'){
            resultado = entrada * 1055.06;
            unidadeInicial = 'BTU';
            unidadeFinal   = 'J';
        }
        else{
            resultado = (entrada / 1055.06);
            unidadeInicial = 'J';
            unidadeFinal   = 'BTU';
        }

        if(resultado >= 0){
            $("#labelValorFinal").html("Resultado: " + entrada + unidadeInicial + " = " + parseFloat((resultado)).toFixed(2) + unidadeFinal);
        }
        else{
            $("#labelValorFinal").html("");
        }
    })

    $('#inputValor').on('keyup', function() {
        $(this).maskMoney({
            thousands: '.',
            decimal: ',',
            allowZero: true,
            allowNegative: false
        });
    });

    function removeCaracteres(valor){
        dados = valor.replaceAll(".", "");
        dados = dados.replaceAll(",", ".");

        return dados;
    }

</script>