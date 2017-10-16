package main

import (
	"fmt"
	"strings"
	"sync"
)

var letters []byte;

func main() {
    letters = []byte{'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'};
    var wg sync.WaitGroup
    textoSlice := strings.Split("o rato roeu a roupa do rei de roma", " ")
    processaPalavra(textoSlice, &wg)
    wg.Wait()
}

func processaPalavra(textoSlice []string, wg *sync.WaitGroup) {
  for _, palavra := range textoSlice {
	   wg.Add(1)
	   go pegaPalavraEDizSeEPrimo(palavra, wg)
    fmt.Println("palavra sendo avaliada:", palavra)
  }
}

func pegaPalavraEDizSeEPrimo(palavra string, wg *sync.WaitGroup) {
  var palavraEmNumero int
  ePrimo := true
	for index, _ := range palavra {
    palavraEmNumero += pegaLetraERetornaNumero(palavra[index])
	}

  for i := 1; i <= palavraEmNumero; i++ {
    if palavraEmNumero % i != 0 {
      ePrimo = false
      break
    }
  }
  if ePrimo {
    fmt.Println("palavra: ", palavra, " com o resultado: ", palavraEmNumero, " é primo")
  } else {
    fmt.Println("palavra: ", palavra, " com o resultado: ", palavraEmNumero, " não é primo")
  }
	wg.Done()
}

func pegaLetraERetornaNumero(letra byte) int {
	var numero int
	for index, element := range letters {
		if element == letra {
			numero = index+1
      break
		}
	}
	return numero
}
