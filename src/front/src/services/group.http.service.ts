import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Group } from '../models/group.model';
import { environment } from '../environments/environment';

// @Todo tests
@Injectable({
  providedIn: 'root'
})
export class GroupHttpService {

protected source = `${environment.backendUrl}/groups`;

constructor(
  private http: HttpClient
) { }

getGroups(): Promise<Group[]> {
  return this.http.get<Group[]>(this.source).toPromise();
}

}
