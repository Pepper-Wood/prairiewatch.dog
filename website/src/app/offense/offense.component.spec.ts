import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { OffenseComponent } from './offense.component';

describe('OffenseComponent', () => {
  let component: OffenseComponent;
  let fixture: ComponentFixture<OffenseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OffenseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(OffenseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
