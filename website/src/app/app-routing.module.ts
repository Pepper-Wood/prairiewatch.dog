import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { EntryComponent } from './entry/entry.component';
import { OffenseComponent } from './offense/offense.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'e/:id', component: EntryComponent },
  { path: 'offenses/:id', component: OffenseComponent, pathMatch: 'full'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
