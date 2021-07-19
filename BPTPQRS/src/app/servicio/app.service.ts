import { Injectable } from '@angular/core';
import { AngularFireStorage } from '@angular/fire/storage';

@Injectable({
  providedIn: 'root'
})
export class AppService {

  constructor(
    private storage: AngularFireStorage
  ) { }
}
