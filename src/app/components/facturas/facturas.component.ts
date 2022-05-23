import { Component, OnInit } from '@angular/core';
import {FormArray, FormBuilder, FormControl, FormGroup, FormGroupDirective, NgForm, Validators} from '@angular/forms';
import {ValidacionService} from "../../core/validacion.service";
import Swal from  "sweetalert2";
import {FacturacionService} from "../../core/facturacion.service";

@Component({
  selector: 'app-facturas',
  templateUrl: './facturas.component.html',
  styleUrls: ['./facturas.component.css']
})
export class FacturasComponent implements OnInit {

  constructor(private validacionService: ValidacionService,
              private facturacionService: FacturacionService,
              private fb: FormBuilder) { }

  selectclasificador1 = [];
  selectclasificador2 = [];
  facturaFormControl = this.fb.group({
    cliente: [''],
    id: [''],
    items:this.fb.array([]),
    empresa: ['']
  });


  ngOnInit(): void {
    this.Clientes();
    this.Productos();
  }
// @ts-ignore
  items(): FormArray{
    return this.facturaFormControl.get('items') as FormArray
  }
  newItem(): FormGroup{
    return this.fb.group({
      item: '',
      cantidad: ''
    })
}
addItem(){
    this.items().push(this.newItem());
}
  Clientes(): any{
    // @ts-ignore
    this.facturacionService.buscarCliente().subscribe(data => {
      if (data.state === 200) {
        this.selectclasificador1 = data.dataArray;
      }
    });
  }
  Productos(): any{
    // @ts-ignore
    this.facturacionService.buscarProducto().subscribe(data => {
      if (data.state === 200) {
        this.selectclasificador2 = data.dataArray;
      }
    });
  }

  Validar(): any {


    // @ts-ignore
    this.validacionService.validarFactura(this.facturaFormControl.value).subscribe(data => {

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
    this.facturacionService.guardarFactura(this.facturaFormControl.value).subscribe(data => {

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
