import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-offenderslist',
  templateUrl: './offenderslist.component.html',
  styleUrls: ['./offenderslist.component.css']
})
export class OffendersListComponent implements OnInit {
  data;

  constructor(
    private http: HttpClient,
  ) { }

  ngOnInit(): void {
    this.loadJson();
  }

  loadJson() {
    const url = 'https://raw.githubusercontent.com/Pepper-Wood/prairiewatch.dog/master/data/listing.json';

    this.http.get(url).subscribe((res) => {
      this.data = res;
    })
  }

}
