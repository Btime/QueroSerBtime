<?php
/*
Índice de Equilíbrio
Contribuição de: Renne Rocha

Você está resolvendo este problema. 
Este problema foi utilizado em 121 Dojo(s).

Um vetor com N números inteiros é dado. O índice de equilíbrio deste vetor é o número inteiro P (com 0 ≤ P < N) e soma dos elementos do vetor com índices inferiores é igual a soma dos elementos de índices superiores. Isto é:

A[0] + A[1] + ... + A[P−1] = A[P+1] + ... + A[N−2] + A[N−1]

Assumimos que a soma de zero elementos é igual a zero. Isso pode acontecer se P = 0 ou se P = N-1.

Por exemplo, tendo o seguinte vetor com 7 elementos:

A[0] = -7 A[1] = 1 A[2] = 5 A[3] = 2 A[4] = -4 A[5] = 3 A[6] = 0

Então:

P = 3 é um índice de equilíbrio deste vetor, já que A[0] + A[1] + A[2] = A[4] + A[5] + A[6]
P = 6 também é um índice de equilíbrio deste vetor, já que A[0] + A[1] + A[2] + A[3] + A[4] + A[5] = 0 e não existem elementos com índices maiores que 6.
Escreva uma função que, dado um vetor A com índices iniciando em zero, com N número inteiros, retorna qualquer um de seus índices de equilíbrio.

A função deve retornar -1 se o índice de equilíbrio não existir.
*/

#Class para realizar 
class vetor{
	public $itens = array();
	public function add( $key, $value){
		$this->itens[ $key ] = $value ;
	}
	public function teste(){
		$queue = array();
		for( $x = 0 ; $x < count( $this->itens ) ; $x++ ){
			if( $x + 1 < count( $this->itens ) ){
				if( array_sum( array_values( array_slice( $this->itens, 0 , $x + 1 ) ) ) == array_sum( array_values( array_slice( $this->itens , $x + 2 ) ) ) ){
					$queue[] = ( $x + 1 ) ;
				}
			}
		}
		return count( $queue ) ? $queue : -1;
	}
}

#teste
$input = array( -7 , 1 ,5 , 2 , -4 ,3 , 0 );
$v = new vetor();
foreach ( $input as $key => $value) {
	$v->add( $key , $value ); 
}
print_r( $v->teste() );
?>