import { TestBed } from '@angular/core/testing';

import { GroupHttpService } from './group.http.service';

describe('GroupService', () => {
  let service: GroupHttpService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(GroupHttpService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
