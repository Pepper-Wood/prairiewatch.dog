import { HttpClient, HttpClientModule } from '@angular/common/http';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { MarkdownModule } from 'ngx-markdown';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { OffenderComponent } from './offender/offender.component';
import { HomeComponent } from './home/home.component';
import { OffenseComponent } from './offense/offense.component';
import { OffendersListComponent } from './offenderslist/offenderslist.component';
import { OffensesListComponent } from './offenseslist/offenseslist.component';

@NgModule({
  declarations: [
    AppComponent,
    OffenderComponent,
    HomeComponent,
    OffenseComponent,
    OffendersListComponent,
    OffensesListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,
    MarkdownModule.forRoot({ loader: HttpClient })
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
