import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { HttpClient } from "@angular/common/http";
import { jsyaml } from 'js-yaml';
import { map } from 'rxjs/operators';

@Component({
  selector: 'app-entry',
  templateUrl: './entry.component.html',
  styleUrls: ['./entry.component.css']
})
export class EntryComponent implements OnInit {
  uuid;
  private data:any = [];

  constructor(
    private route: ActivatedRoute,
    private http: HttpClient,
  ) { }

  ngOnInit() {
    this.route.paramMap.subscribe(params => {
      this.uuid = +params.get('uuid');
    });
  }

  getJson() {
    const url ='https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/generated/websites.json';
    this.http.get(url).subscribe((res) => {
      this.data = res;
      console.log(this.data);
    });
  }

  public getYaml() {
    // THIS DOESN'T WORK. Switch the files to use JSON instead???
    // The method instead should be to store the yaml files as one reference, convert that to JSON, and then have that pulled in here.
    const url = 'https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/database/offenders/0680b520-0252-440f-953c-fcec27740a45.yml';
    this.data = this.http.get(url, {
      observe: 'body',
      responseType: "text"   // This one here tells HttpClient to parse it as text, not as JSON
    }).pipe(
      // Map Yaml to JavaScript Object
      map(yamlString => jsyaml.load(yamlString))
    );
    console.log(this.data);
  }

}
