import {NgModule} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';
import {AppComponent} from "./app.component";
import {ClientesComponent} from "./components/clientes/clientes.component";
import {LayoutComponent} from "./components/layout/layout.component";
import {ProductosComponent} from "./components/productos/productos.component";
import {FacturasComponent} from "./components/facturas/facturas.component";
import {ExcepcionesComponent} from "./components/excepciones/excepciones.component";

const routes: Routes = [{
    path: '',
  component: LayoutComponent,
  children: [{
    path: '',
    component: ClientesComponent
  }, {
 path: 'clientes',
    component: ClientesComponent
},{
    path: 'productos',
    component: ProductosComponent
  },{
    path: 'facturas',
    component: FacturasComponent
  },{
    path: 'excepciones',
    component: ExcepcionesComponent
  }]
},];

@NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule]
})
export class AppRoutingModule {
}
