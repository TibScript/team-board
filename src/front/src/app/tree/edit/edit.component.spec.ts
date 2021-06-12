import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TreeEditComponent } from './edit.component';

describe('TreeEditComponent', () => {
  let component: TreeEditComponent;
  let fixture: ComponentFixture<TreeEditComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ TreeEditComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(TreeEditComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
