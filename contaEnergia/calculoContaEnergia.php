<?php
    
?>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM="crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

<body>
    <div class="titulo">Cálculo de Conta Energia</div>
    <div class="row">
        <div class="form-group col-md-6">
            <label for="nome">Valor Consumido (kWh)</label>
            <input type="text" class="form-control" min="0" id="inputConsumo" placeholder="0,00 kWh">
            <!-- <div class="invalid-feedback"><?= $erros['consumo']; ?></div> -->
        </div>
        <div class="form-group col-md-6">
            <label for="nascimento">Preço kWh (R$)</label>
            <input type="text" class="form-control" min="0" id="inputPreco" placeholder="R$ 0,00">
			<!-- <input type="text" class="form-control moeda" min="0" id="EditTotReceber" value="0,00"> -->
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <label id="labelValorFinal" for="nome"></label>
        </div>
        <div class="form-group col-md-6">
        </div>
    </div>
    <br>
    <button class="btn btn-primary btn-exercicio" id="calcular">Enviar</button>
<body>

<script>

    $(document).ready(function(){
    
    });

    $("#calcular").click(function(){
        var consumo    = parseFloat(removeCaracteres($("#inputConsumo").val()));
        var preco      = parseFloat(removeCaracteres(document.getElementById("inputPreco").value));
        var valorFinal = parseFloat(preco * consumo);
        
        if(valorFinal >= 0){
            valorFinal     = moedaBR(valorFinal);
            $("#labelValorFinal").html("Sua conta de energia custa " + valorFinal);
        }
        else{
            $("#labelValorFinal").html("");
        }
    })

    $('#inputPreco').on('keyup', function() {
        $(this).maskMoney({
            prefix: 'R$ ',
            thousands: '.',
            decimal: ',',
            allowZero: true,
            allowNegative: false
        });
    });

    $('#inputConsumo').on('keyup', function() {
        $(this).maskMoney({
            suffix: ' kWh',
            thousands: '.',
            decimal: ',',
            allowZero: true,
            allowNegative: false
        });

    });

    function moedaBR(valor) {
        return valor.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    }

    function removeCaracteres(valor){
        dados     = valor.replaceAll("R$", "");
        dados     = dados.replaceAll("kWh", "");
        dados     = dados.replaceAll(".", "");
        dados     = dados.replaceAll(",", ".");

        return dados;
    }

</script>