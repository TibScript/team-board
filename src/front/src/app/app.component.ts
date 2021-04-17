import {NestedTreeControl} from '@angular/cdk/tree';
import { Component, OnInit } from '@angular/core';
import {MatTreeNestedDataSource} from '@angular/material/tree';
import { Group } from 'src/models/group.model';
import { GroupHttpService } from 'src/services/group.http.service';

import { Tree } from './tree'
import { TreeService } from './tree.service'

const TREE_DATA: Tree[] = [
  {
    uid:0,
    name: 'Fruit',
    children: [
      {uid:1,name: 'Apple'},
      {uid:2,name: 'Banana'},
      {uid:3,name: 'Fruit loops'},
    ]
  }, {
    uid:4,
    name: 'Vegetables',
    children: [
      {
        uid:5,
        name: 'Green',
        children: [
          {uid:6,name: 'Broccoli'},
          {uid:7,name: 'Brussels sprouts'},
        ]
      }, {
        uid:8,
        name: 'Orange',
        children: [
          {uid:9,name: 'Pumpkins'},
          {uid:10,name: 'Carrots'},
        ]
      },
    ]
  },
];

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.less']
})
export class AppComponent implements OnInit {
  title = 'Team Board';
  treeControl = new NestedTreeControl<Tree>(node => node.children);
  dataSource = new MatTreeNestedDataSource<Tree>();
  groups$: Promise<Group[]>;

  constructor(
    private treeService: TreeService,
    private groupService: GroupHttpService,
  ) {
    this.dataSource.data = TREE_DATA;
  }

  ngOnInit() {
    this.groups$ = this.groupService.getGroups();
  }

  hasChild = (_: number, node: Tree) => !!node.children && node.children.length > 0;
}