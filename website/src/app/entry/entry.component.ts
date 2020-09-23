import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { parse } from 'yamljs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-entry',
  templateUrl: './entry.component.html',
  styleUrls: ['./entry.component.css']
})
export class EntryComponent implements OnInit {
  uuid;
  data;

  constructor(
    private route: ActivatedRoute,
    private http: HttpClient,
  ) { }

  ngOnInit() {
    this.route.paramMap.subscribe(params => {
      this.uuid = params.get('id');
      this.getJson().subscribe(data => {
        this.data = data;
        console.log(data);
      });
    });
  }

  public getJson(): Observable<any> {
    // const url ='https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/' + this.uuid + '.yml';
    const url = 'https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/6aff36609586939548ecc7c00192b69d1e08de93/database/offenders/0680b520-0252-440f-953c-fcec27740a45.yml';
    return this.http.get(url, {
      observe: 'body',
      responseType: "text"   // This one here tells HttpClient to parse it as text, not as JSON
    }).pipe(
      // Map Yaml to JavaScript Object
      map(yamlString => parse(yamlString))
    );
  }

}
