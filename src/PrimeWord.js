export default class PrimeWord {
  constructor () {

  }

  isPrime (word) {
    if (!word || !/[a-zA-Z]+/.test(word)) {
      return new Error('Word must be a valid string')
    }
    return word
  }
}
