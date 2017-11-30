export default class PrimeWord {
  constructor () {
    const alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
    this.alphabetMapValue = alphabet.split('').map((letter, index) => (
      { letter, value: index + 1 }
    ))
    this.primeSquareMapStore = { 1: true, 2: true }
  }

  _isPrimeNumber (value) {
    const square = Math.floor(Math.sqrt(value))
    if (this.primeSquareMapStore[square]) return this.primeSquareMapStore[square]
    for (let i = 2; i <= square; i++) {
      if (value % i === 0) return false
    }
    return this.primeSquareMapStore[square] = true
  }

  isPrime (word) {
    if (!word || !/[a-zA-Z]+/.test(word)) {
      return new Error('Word must be a valid string')
    }
    const sum = word.split('').reduce((total, letter) => (
      total += this.alphabetMapValue.find(alphabetValue => alphabetValue.letter === letter).value
    ), 0)
    return this._isPrimeNumber(sum)
  }
}
