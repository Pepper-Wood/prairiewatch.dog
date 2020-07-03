import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { RouterTestingModule } from '@angular/router/testing';

import { OffenseComponent } from './offense.component';

describe('OffenseComponent', () => {
  let component: OffenseComponent;
  let fixture: ComponentFixture<OffenseComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ OffenseComponent ],
      imports: [
        RouterTestingModule
      ],
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
