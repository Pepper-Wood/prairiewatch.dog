import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './home/home.component';
import { OffenderComponent } from './offender/offender.component';
import { OffendersListComponent } from './offenderslist/offenderslist.component';
import { OffenseComponent } from './offense/offense.component';
import { OffensesListComponent } from './offenseslist/offenseslist.component';

const routes: Routes = [
  { path: '', component: HomeComponent },
  { path: 'offenders', component: OffendersListComponent },
  { path: 'offenses', component: OffensesListComponent },
  { path: 'offenses/:id', component: OffenseComponent, pathMatch: 'full'},
  { path: ':slug', component: OffenderComponent }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
