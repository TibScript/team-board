import { Component, Input, OnChanges } from '@angular/core';
import { NestedTreeControl } from '@angular/cdk/tree';
import { MatTreeNestedDataSource } from '@angular/material/tree';
import { Group } from 'src/models/group.model';

@Component({
  selector: 'app-tree-view',
  templateUrl: './tree-view.component.html',
  styleUrls: ['./tree-view.component.less']
})
export class TreeViewComponent implements OnChanges {

  treeControl = new NestedTreeControl<Group>(node => node.members);
  dataSource = new MatTreeNestedDataSource<Group>();

  @Input() groups: Group[];

  constructor() { }

  ngOnChanges(): void {
    this.dataSource.data = this.groups;
  }

  hasChild = (_: number, node: Group) => !!node.members && node.members.length >= 0;

}
