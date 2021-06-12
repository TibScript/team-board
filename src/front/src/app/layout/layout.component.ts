import { Component, Input, OnInit } from '@angular/core';
import { Group } from 'src/models/group.model';

@Component({
  selector: 'app-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.less']
})
export class LayoutComponent implements OnInit {

  @Input() title: String;
  @Input() groups: Group[];

  constructor() { }

  ngOnInit(): void {
  }

}
