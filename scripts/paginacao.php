<style type="text/css">
<!--
.pgoff {font-family: Verdana, Arial, Helvetica; font-size: 9px; color: #FF0000; text-decoration: none}
a.pg {font-family: Verdana, Arial, Helvetica; font-size: 9px; color: #666666; text-decoration: none}
a:hover.pg {font-family: Verdana, Arial, Helvetica; font-size: 9px; color: #FF0000; text-decoration:underline}
-->
</style>
<center>

<?php
    $quant_pg = ceil($quantreg/$numreg);
    $quant_pg++;
    
    // Verifica se esta na primeira página, se nao estiver ele libera o link para anterior
    if ( $_GET['pg'] > 0) {
        echo "<a href=".$PHP_SELF."?pg=".($_GET['pg']-1)." class=pg><b>&laquo; Anterior</b></a>\n";
    } else {
        echo "<a class=pg><b><font color=#cccccc>&laquo; Anterior</font></b></a>\n";
    }
    
    // Faz aparecer os numeros das página entre o ANTERIOR e PROXIMO
    for($i_pg=1;$i_pg<$quant_pg;$i_pg++) {
        // Verifica se a página que o navegante esta e retira o link do número para identificar visualmente
        if ($_GET['pg'] == ($i_pg-1)) {
            echo "<span class=pgoff>[$i_pg]</span>\n";
        } else {
            $i_pg2 = $i_pg-1;
            echo "<a href=".$PHP_SELF."?pg=$i_pg2 class=pg><b>$i_pg</b></a>\n";
        }
    }
    
    // Verifica se esta na ultima página, se nao estiver ele libera o link para próxima
    if (($_GET['pg']+2) < $quant_pg) {
        echo "<a href=".$PHP_SELF."?pg=".($_GET['pg']+1)." class=pg><b>Próximo &raquo;</b></a>\n";
    } else {
        echo "<a class=pg><b><font color=#cccccc>Próximo &raquo;</font></a>\n";
    }
?>
</center>