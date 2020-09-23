import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { OffenderComponent } from './offender/offender.component';
import { OffenseComponent } from './offense/offense.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: '/:slug', component: OffenderComponent },
  { path: 'offenses/:id', component: OffenseComponent, pathMatch: 'full'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
