import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { parse } from 'yamljs';
import { map } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-entry',
  templateUrl: './offender.component.html',
  styleUrls: ['./offender.component.css']
})
export class OffenderComponent implements OnInit {
  slug;
  data;

  constructor(
    private route: ActivatedRoute,
    private http: HttpClient,
  ) { }

  ngOnInit() {
    this.route.paramMap.subscribe(params => {
      this.slug = params.get('slug');
      this.loadYaml().subscribe(data => {
        this.data = data;
        console.log(data);
      });
    });
  }

  public loadYaml(): Observable<any> {
    const url = 'https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/data/offenders/' + this.slug + '.yml';
    return this.http.get(url, {
      observe: 'body',
      responseType: "text"   // This one here tells HttpClient to parse it as text, not as JSON
    }).pipe(
      // Map Yaml to JavaScript Object
      map(yamlString => parse(yamlString))
    );
  }

}
