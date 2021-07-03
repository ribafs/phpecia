<?php
$xmlstr = <<<XML
<?xml version='1.0' encoding='ISO-8859-1' ?>
<filmes>
 <filme>
  <titulo>PHP: Iniciando o Parser</titulo>
  <personagens>
   <personagem>
   <nome>João de Brito</nome>
   <actor>Brito</actor>
   </personagem>
   <personagem>
   <nome>Manoel Cunha</nome>
   <actor>Manoel</actor>
   </personagem>
  </personagens>
  <comentario>
   O XML é uma linguagem. Ela é como uma linguagem de programação. Ou uma 
   linguagem de script? Tudo será revelado após ler bem toda a 
   documentação.
  </comentario>
  <votos type="thumbs">7</votos>
  <votos type="stars">5</votos>
 </filme>
</filmes>
XML;
?> 