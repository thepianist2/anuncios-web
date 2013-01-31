<?php

echo nl2br(html_entity_decode($condiciones->getContenido(), ENT_COMPAT , 'UTF-8'));

echo "</br></br></br></br></br>";

echo nl2br(html_entity_decode($politica->getContenido(), ENT_COMPAT , 'UTF-8'));
?>
