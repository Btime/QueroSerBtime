import { expect } from 'chai'
import Mock from './mock'
import PrimeWord  from '../src/PrimeWord'

describe('PrimeWords', () => {

  let primeWord = null

  beforeEach(() => {
    primeWord = new PrimeWord()
  })

  it ('Expect primeWord const isn\'t to be equal null', () => {
    expect(primeWord).not.be.equal(null)
  })

  it ('Expect to be a string', () => {
    expect(primeWord.isPrime(Mock.primeWord)).to.be.equal('string')
  })
})
