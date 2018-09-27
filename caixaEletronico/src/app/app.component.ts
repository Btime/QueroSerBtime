import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  public nota = 0;
  public contadorNotaDez = 0;
  public contadorNotaVinte = 0;
  public contadorNotaCinquenta = 0;
  public contadorNotaCem = 0;

  constructor(public router: Router) { }

  notaDez() {
    this.contadorNotaDez ++;
    return this.nota += 10;
  }
  notaVinte() {
    this.contadorNotaVinte ++;
    return this.nota += 20;
  }
  notaCinquenta() {
    this.contadorNotaCinquenta ++;
    return this.nota += 50;
  }
  notaCem() {
    this.contadorNotaCem ++;
    return this.nota += 100;
  }

  corrigir () {
    this.nota = 0;
    this.zerando();

  }

  zerando () {
    this.contadorNotaDez = 0;
    this.contadorNotaVinte = 0;
    this.contadorNotaCinquenta = 0;
    this.contadorNotaCem = 0;
  }


}
