import { Injectable } from '@angular/core';
import {catchError} from 'rxjs/operators';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {throwError} from 'rxjs';
import {environment} from "../../environments/environment";

@Injectable({
  providedIn: 'root'
})
export class ValidacionService {
  static handleError(error: HttpErrorResponse): any {
    console.log(error);
    return throwError('Ha ocurrido un error..');
  }
  constructor(private http: HttpClient) { }
  validarCliente(inf:any): any {
    const dataObj: object = {
      metodo: 'validarCliente',
      info: inf
    };
    return this.http.post(`${environment.url_api}/validacionCTRL.php`, dataObj).pipe(
      catchError(ValidacionService.handleError));
  }
  validarProducto(inf:any): any {
    const dataObj: object = {
      metodo: 'validarProducto',
      info: inf
    };
    return this.http.post(`${environment.url_api}/validacionCTRL.php`, dataObj).pipe(
      catchError(ValidacionService.handleError));
  }
  validarFactura(inf:any): any {
    const dataObj: object = {
      metodo: 'validarFactura',
      info: inf
    };
    return this.http.post(`${environment.url_api}/validacionCTRL.php`, dataObj).pipe(
      catchError(ValidacionService.handleError));
  }

}
