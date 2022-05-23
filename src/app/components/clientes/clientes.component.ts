import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormControl, FormGroupDirective, NgForm, Validators} from '@angular/forms';
import {ValidacionService} from "../../core/validacion.service";
import Swal from  "sweetalert2";
import {FacturacionService} from "../../core/facturacion.service";

@Component({
  selector: 'app-clientes',
  templateUrl: './clientes.component.html',
  styleUrls: ['./clientes.component.css']
})
export class ClientesComponent implements OnInit {

  constructor( private validacionService: ValidacionService,
               private facturacionService: FacturacionService,
               private fb: FormBuilder) { }
  // @ts-ignore
  loading: boolean;
  clienteFormControl = this.fb.group({
    nombre: [''],
    apellido: [''],
    telefono: [''],
    id: [''],
    date: [''],
  });
  ngOnInit(): void {

  }
  Validar(): any {

    this.loading = true;
    // @ts-ignore
    this.validacionService.validarCliente(this.clienteFormControl.value).subscribe(data => {
      this.loading = false;
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
    this.loading = true;
    // @ts-ignore
    this.facturacionService.guardarCliente(this.clienteFormControl.value).subscribe(data => {
      this.loading = false;
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
