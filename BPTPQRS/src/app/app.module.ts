import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AngularFireModule } from '@angular/fire';
import { environment } from '../environments/environment';
import { AngularFirestoreModule } from '@angular/fire/firestore';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { PeticionComponent } from './peticion/peticion.component';
import { QuejaComponent } from './queja/queja.component';
import { ReclamoComponent } from './reclamo/reclamo.component';

@NgModule({
  declarations: [
    AppComponent,
    PeticionComponent,
    QuejaComponent,
    ReclamoComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    AngularFireModule.initializeApp(environment.firebaseConfig),
    AngularFirestoreModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
