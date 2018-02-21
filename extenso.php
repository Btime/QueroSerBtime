<?php
/**
  Método que transforma valores monetários numéricos em extenso.
  Versão 1.0.0
  PHP V ^7
  Criado em 21/02/2018 by Fábio Busnello
  
  #prblema retirado do site http://dojopuzzles.com/problemas/exibe/cheque-por-extenso/
  
  #uso
  $ext = extenso('10150,20', true);
  
 #por padrão ele retorna o extenso em minúsculo, se o segundo parâmetro for um boolean true o extenso é retornado com as primeiras letras maiúsculas.
*/
function extenso( $valor, $maiusculas=false ) {
  
  //Cria uma Matriz com as strings monetárias no singular
  $singular = array( "centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão" );
  
  //Cria uma Matriz com as strings monetárias no plural
  $plural = array( "centavos", "reais", "mil", "milhões", "bilhões", "trilhões", "quatrilhões" );
  
  //Cria uma Matriz com as strings acima de cem até novecentos
  $centos = array( "", "cem", "duzentos", "trezentos", "quatrocentos", "quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
  
  //Cria uma Matriz com strings das dezenas
  $d = array( "", "dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa" );
  
  //Cria uma Matriz com strings de dez à dezenove
  $d10 = array( "dez", "onze", "doze", "treze", "quatorze", "quinze", "dezesseis", "dezesete", "dezoito", "dezenove" );
  
  //Cria uma Matriz com strings de um à nove
  $u = array("", "um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove");
  
  //Cria um contador para o loop à partir do 0
  $z = 0;
  
  //Cria um retorno vazio que será preenchido de acordo com o valor passado no parâmetro deste método
  $rt = "";
  
  //Reformata o valor passado no padrão monetário
  $valor = number_format( $valor, 2, ".", "." ); 
  
  //separa os valores inteiros
  $inteiro = explode( ".", $valor ); 
  
  //inicia o loop e a concatenação das strings e transforma o valor numérico passado por extenso.
  for( $i=0; $i < count($inteiro); $i++ )
    for( $ii = strlen( $inteiro[ $i ] ); $ii < 3; $ii++ )
      $inteiro[ $i ] = "0" . $inteiro[ $i ];
      $fim = count( $inteiro ) - ( $inteiro[ count( $inteiro )-1 ] > 0 ? 1 : 2); 
      for ( $i = 0; $i < count( $inteiro ); $i++ ){
        $valor = $inteiro[$i]; 
        $rc = (($valor > 100) && ($valor < 200)) ? "cento" : $centos[$valor[0]]; 
        $rd = ($valor[1] < 2) ? "" : $d[$valor[1]]; 
        $ru = ($valor > 0) ? (($valor[1] == 1) ? $d10[$valor[2]] : $u[$valor[2]]) : ""; 
        $r = $rc . ( ( $rc && ( $rd || $ru ) ) ? " e " : "" ).$rd.(($rd && $ru) ? " e " : "").$ru; 
        $t = count($inteiro)-1-$i; 
        $r .= $r ? " " . ( $valor > 1 ? $plural[ $t ] : $singular[ $t ]) : "" ;
        if ( $valor == "000" ) $z++; elseif ( $z > 0 ) $z--;
        if ( ( $t==1 ) && ( $z>0 ) && ( $inteiro[0] > 0 ) ) $r .= ( ( $z>1 ) ? " de " : "") . $plural[$t];
        if ( $r ) $rt = $rt . ( ( ( $i > 0 ) && ( $i <= $fim ) && ( $inteiro[0] > 0 ) && ( $z < 1 ) ) ? ( ( $i < $fim ) ? ", " : " e " ) : "" ) . $r; 
} 
    if( !$maiusculas ){ 
      return( $rt ? $rt : "zero" ); 
    }else{
      if ( $rt ) $rt=str_replace("E","e", ucwords($rt) );
      return (($rt) ? ($rt) : "Zero"); 
    }
}
?>
