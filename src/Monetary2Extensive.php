<?php
/** Class to show monetary value
 * by Fábio Busnello
 */
namespace src;

class Monetary2Extensive
{
    //attribute declaration
    //array of money in the singular
    private $singular = array("centavo", "real", "mil", "milhão", "bilhão", "trilhão", "quatrilhão");
    //plural array of money
    private $plural = array("centavos", "reais", "mil", "milhões", "bilhões", "trilhões","quatrilhões");
    //array hundreds
    private $hundreds = array("", "cem", "duzentos", "trezentos", "quatrocentos","quinhentos", "seiscentos", "setecentos", "oitocentos", "novecentos");
    //array of dozens
    private $dozens = array("", "dez", "vinte", "trinta", "quarenta", "cinquenta","sessenta", "setenta", "oitenta", "noventa");
    //array of dozens10
    private $dozens10 = array("dez", "onze", "doze", "treze", "quatorze", "quinze","dezesseis", "dezesete", "dezoito", "dezenove");
    //array of unitary
    private $unitary = array("", "um", "dois", "três", "quatro", "cinco", "seis","sete", "oito", "nove");
    //property that will receive the numeral value
    protected $value;
    
    //construct method
    function __construct( $value = 0 ){
      $this->setValue($value);
      return ($value) ? $this->Value2String( $this->getValue() ) : $this->setValue(0);
    }
    
    //method that returns, based on the past value, the monetary value full string (pt-br => R$)
    function Value2String()
    {
        $value = self::correctedFormattedValue( self::getValue() );
        if(!$value){
            return "value not found";
        }

        $z = 0;
        $value = number_format( $value, 2, ".", "." );
        $int = explode( ".", $value );

        for ( $i = 0; $i < count( $int ); $i++ )
        {
            for ( $ii = mb_strlen( $int[$i] ); $ii < 3; $ii++ )
            {
                $int[$i] = "0" . $int[$i];
            }
        }

        //identifies where the joining of hundreds by "e" or by ","
        $rt = null;
        $fim = count( $int ) - ( $int[ count( $int ) - 1 ] > 0 ? 1 : 2 );
        for ( $i = 0; $i < count( $int ); $i++ )
        {
            $value = $int[$i];
            $rc = (($value > 100) && ($value < 200)) ? "cento" : $this->hundreds[$value[0]];
            $rd = ($value[1] < 2) ? "" : $this->dozens[$value[1]];
            $ru = ($value > 0) ? (($value[1] == 1) ? $this->dozens10[$value[2]] : $this->unitary[$value[2]]) : "";

            $r = $rc . (($rc && ($rd || $ru)) ? " e " : "") . $rd . (($rd && $ru) ? " e " : "") . $ru;
            $t = count( $int ) - 1 - $i;
            $r .= $r ? " " . ($value > 1 ? $this->plural[$t] : $this->singular[$t]) : "";
            if ( $value == "000")
                $z++;
            elseif ( $z > 0 )
                $z--;
                
            if ( ($t == 1) && ($z > 0) && ($int[0] > 0) )
                $r .= ( ($z > 1) ? " de " : "") . $this->plural[$t];
                
            if ( $r )
                $rt = $rt . ((($i > 0) && ($i <= $fim) && ($int[0] > 0) && ($z < 1)) ? ( ($i < $fim) ? ", " : " e ") : " ") . $r;
        }

        $rt = mb_substr( $rt, 1 );

        return($rt ? trim( $rt ) : "zero");

    }

    //method that removes if passed a numeral formatted with . and ,
    public static function correctedFormattedValue( $strNumero )
    {
 
        $strNumero = trim( str_replace( "R$", null, $strNumero ) );
 
        $vetVirgula = explode( ",", $strNumero );
        if ( count( $vetVirgula ) == 1 )
        {
            $acentos = array(".");
            $resultado = str_replace( $acentos, "", $strNumero );
            return $resultado;
        }
        else if ( count( $vetVirgula ) != 2 )
        {
            return $strNumero;
        }
 
        $strNumero = $vetVirgula[0];
        $strDecimal = mb_substr( $vetVirgula[1], 0, 2 );

        $acentos = array(".");
        $resultado = str_replace( $acentos, "", $strNumero );
        $resultado = $resultado . "." . $strDecimal;

        return $resultado;

    }

    //method that set the numerical value
    public function setValue($value)
    {
      $this->value = $value;
    }
    
    //method that return the numeric value
    public function getValue()
    {
      return $this->value;
    }  
}
?>