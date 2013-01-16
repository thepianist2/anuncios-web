<?php 
$titulo = array(); 
foreach ($anuncios as $anuncio): 

    $titulo[] = array ( 'label' => utf8_encode($anuncio->getTitulo()),'value' =>utf8_encode( $anuncio->getTitulo() ) ); 

        
   endforeach; 

   
   echo json_encode($titulo);