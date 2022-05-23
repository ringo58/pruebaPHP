import { Injectable } from '@angular/core';
import {catchError} from 'rxjs/operators';
import {HttpClient, HttpErrorResponse} from '@angular/common/http';
import {throwError} from 'rxjs';
import {environment} from "../../environments/environment";
interface ResponseModel {
  state: number;
  msg: string;
  dataArray: [];
}
@Injectable({
  providedIn: 'root'
})


export class FacturacionService {
  static handleError(error: HttpErrorResponse): any {
    console.log(error);
    return throwError('Ha ocurrido un error..');
  }
  constructor(private http: HttpClient) { }
  guardarCliente(inf:any): any {
    const dataObj: object = {
      metodo: 'guardarCliente',
      info: inf
    };
    return this.http.post(`${environment.url_api}/facturacionCTRL.php`, dataObj).pipe(
      catchError(FacturacionService.handleError));
  }

  guardarProducto(inf:any): any {
    const dataObj: object = {
      metodo: 'guardarProducto',
      info: inf
    };
    return this.http.post(`${environment.url_api}/facturacionCTRL.php`, dataObj).pipe(
      catchError(FacturacionService.handleError));
  }
  guardarFactura(inf:any): any {
    const dataObj: object = {
      metodo: 'guardarFactura',
      info: inf
    };
    return this.http.post(`${environment.url_api}/facturacionCTRL.php`, dataObj).pipe(
      catchError(FacturacionService.handleError));
  }

  buscarCliente(): any {
    const dataObj: object = {
      metodo: 'buscarCliente'
    };
    return this.http.post<ResponseModel>(`${environment.url_api}/facturacionCTRL.php`, dataObj).pipe(
      catchError(FacturacionService.handleError));
  }
  buscarProducto(): any {
    const dataObj: object = {
      metodo: 'buscarProducto'
    };
    return this.http.post<ResponseModel>(`${environment.url_api}/facturacionCTRL.php`, dataObj).pipe(
      catchError(FacturacionService.handleError));
  }

}

