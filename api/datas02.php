<div class="titulo">Datas #02</div>

<?php
    $formatoData1 = 'D, d \d\e M \d\e Y';
    $formatoData2 = '%A, $d de %B de %Y';
    $formatoDataHora = '%A, %d de %B de %Y - %H:%M:%S';

    $agora = new Datetime();
    print_r($agora);
    echo "<br>";

?>