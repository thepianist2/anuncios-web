<?php use_helper('Date') ?>
<style>

ol {
	margin: 0;
	padding: 0;
	list-style: none;
}

.comentario {
	float: left; /* float contenedor */
	width: 580px;
	margin: 0 0 20px 0;
	
}

.comentario-meta {
	float: left;
	width: 100px;
	font-size: 84%;
	text-align: center;
	text-shadow: 1px 1px 0 hsla(0,0%,0%,.9);
}

.comentario-meta img {
-moz-transform: rotate(-5deg);
-o-transform: rotate(-5deg);
-webkit-transform: rotate(-5deg);
transform: rotate(-5deg);
}

h4 {
	margin: 0;
	font-size: 100%;
	color:#FF3;
	font-weight: bold;
	line-height: 1;
}

.comentario-meta span {
	font-size: 84%;
	color: #fff;
	font-weight:bold;
}

blockquote {
	position: relative;
	min-height: 20px;
	margin: 0 0 0 100px;
	padding: 5px 5px 5px 5px;
	-moz-border-radius: 0px;
	-webkit-border-radius: 20px;
	border-radius: 20px;
	border-top: 1px solid #fff;
	background-color: hsla(39, 90%, 50%, .5);
	background-image: -moz-linear-gradient(hsla(0,0%,100%,.6),hsla(0,0%,100%,0) 30px );
	background-image: -webkit-gradient(linear,0 0, 0 30,from(hsla(0,0%,100%,.6)),to(hsla(0,0%,100%,0)));
	-moz-box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);
    -webkit-box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);
    box-shadow: 10px 10px 8px hsla(0,0%,0%,.3);		
	word-wrap:break-word;
		
}

blockquote p {
	margin: 0;
	padding: 0 0 10px 0;
}




blockquote:hover {
top: -2px;
left: -2px;
-moz-box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
-webkit-box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
box-shadow: 3px 3px 2px hsla(0,0%,0%,.3);
text-shadow: 3px 1px 1px hsla(0,0%,100%,.8);
}


#elm1{
    width: 600px;
}
.comentario-meta :hover{
    	-moz-transform: scale(1.8, 1.8);
	-webkit-transform: scale(1.8, 1.8);
	-o-transform: scale(1.8, 1.8);
}



blockquote:after {
	content: "\00a0";
	display: block;
	position: absolute;
	top: 20px;
	left: -20px;
    width: 0;
    height: 0;
	border-width: 10px 20px 10px 0;
	border-style: solid;
	border-color: transparent hsla(39, 90%, 50%, .5);
}
</style>
    <?php foreach ($comentarios as $comentario) { ?>
    
<ol id="<?php echo $comentario->id ?>">
    <li class="comentario">

           <div class="comentario-meta" title="<?php echo $comentario->getNombre() ?>">

           <img src="<?php echo '/images/iconos/contactos.png'; ?>" width="59" height="85" alt="">     

         
 
     	<h4><?php echo $comentario->getNombre() ?></h4>

        
     	<span><?php echo $comentario->getCreatedAt();  ?></span>          
      </div>
   
      <blockquote>

         <p><?php echo nl2br(html_entity_decode($comentario->getTexto(), ENT_COMPAT , 'UTF-8')); ?></p>
</blockquote>
   </li>
</ol>
<?php } ?>
