import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-offense',
  templateUrl: './offense.component.html',
  styleUrls: ['./offense.component.css']
})
export class OffenseComponent implements OnInit {
  post: string;

  constructor(private route: ActivatedRoute) { }

  ngOnInit() {
    this.route.params.subscribe(params => {
      this.post = './assets/offenses/' +  params['id'] + '.md';
    });
  }

}
