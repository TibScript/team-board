import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import 'rxjs/add/observable/timer';
import 'rxjs/add/operator/mapTo';
import {IngredientModel} from '../../models/ingredient.model';
import {environment} from '../../../environments/environment';
import { Observable } from 'rxjs';

@Injectable()
export class IngredientsApiService {

  mainUrl: string;
  serviceUrl: string;

  constructor(private http: HttpClient) {
    this.mainUrl = environment.backendUrl;
  }

  list() {
    return this.http.get(`${this.mainUrl}/ingredient/`);
  }

  send(data: any) {
    if (typeof data.id !== 'undefined') {
      const id = data.id;
      return this.set(id, data);
    } else {
      return this.create(data);
    }
  }

  create(data: any): Observable<any> {
    return this.http.post(`${this.mainUrl}/ingredient/new`, data);
  }

  get(id: number): Observable<any> {
    return this.http.get(`${this.mainUrl}/ingredient/${id}`);
  }

  set(id: number, data: any): Observable<any> {
    return this.http.put(`${this.mainUrl}/ingredient/${id}`, data);
  }

  getVisibleTodos( todos, filter ) {
    if (filter === 'SHOW_ALL') {
      return todos;
    } else if (filter === 'SHOW_COMPLETED') {
      return todos.filter(t => t.completed);
    } else {
      return todos.filter(t => !t.completed);
    }
  }
}
