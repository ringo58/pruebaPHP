import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormControl, FormGroupDirective, NgForm, Validators} from '@angular/forms';
import {ValidacionService} from "../../core/validacion.service";
import Swal from  "sweetalert2";
import {FacturacionService} from "../../core/facturacion.service";
@Component({
  selector: 'app-productos',
  templateUrl: './productos.component.html',
  styleUrls: ['./productos.component.css']
})
export class ProductosComponent implements OnInit {

  constructor(private validacionService: ValidacionService,
              private facturacionService: FacturacionService,
              private fb: FormBuilder) { }

  itemFormControl = this.fb.group({
    nombre: [''],
    valor: [''],

  });
  ngOnInit(): void {
  }
  Validar(): any {


    // @ts-ignore
    this.validacionService.validarProducto(this.itemFormControl.value).subscribe(data => {

      if (data.state === 200) {
        this.guardar();
      }else {

        Swal.fire({
          icon: 'info',
          title: 'Advertencia',
          showConfirmButton: true,
          text: data.msg,
        }).then(

        );
      }
    });
  }
  guardar(): any{

    // @ts-ignore
    this.facturacionService.guardarProducto(this.itemFormControl.value).subscribe(data => {

      if (data.state === 200) {
        Swal.fire({
          icon: 'success',
          showConfirmButton: true,
          text: data.msg,
        }).then(() => {
          window.location.reload();
        });

      }else {

        Swal.fire({
          icon: 'info',
          title: 'Advertencia',
          showConfirmButton: true,
          text: data.msg,
        }).then(

        );
      }
    });
  }


}
