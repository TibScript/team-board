import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { MatButtonModule } from '@angular/material/button'
import { MatCardModule } from '@angular/material/card'
import { MatDividerModule } from '@angular/material/divider'
import { MatExpansionModule } from '@angular/material/expansion'
import { MatIconModule } from '@angular/material/icon'
import { MatInputModule } from '@angular/material/input'
import { MatFormFieldModule } from '@angular/material/form-field'
import { MatMenuModule } from '@angular/material/menu'
import { MatSlideToggleModule } from '@angular/material/slide-toggle'
import { MatSnackBarModule } from '@angular/material/snack-bar'
import { MatTabsModule } from '@angular/material/tabs'
import { MatToolbarModule } from '@angular/material/toolbar'
import { MatTreeModule } from '@angular/material/tree'

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { GroupViewComponent } from './group/group-view/group-view.component';
import { GroupEditComponent } from './group/group-edit/group-edit.component';
import { MemberViewComponent } from './member/member-view/member-view.component';
import { MemberEditComponent } from './member/member-edit/member-edit.component';
import { TreeViewComponent } from './tree/tree-view/tree-view.component';
import { TreeEditComponent } from './tree/tree-edit/tree-edit.component';
import { LayoutComponent } from './layout/layout.component';
import { HeaderComponent } from './layout/header/header.component';
import { RightbarComponent } from './layout/rightbar/rightbar.component';
import { LeftbarComponent } from './layout/leftbar/leftbar.component';
import { FooterComponent } from './layout/footer/footer.component';

@NgModule({
  declarations: [
    AppComponent,
    GroupEditComponent,
    GroupViewComponent,
    MemberEditComponent,
    MemberViewComponent,
    TreeEditComponent,
    TreeViewComponent,
    LayoutComponent,
    HeaderComponent,
    RightbarComponent,
    LeftbarComponent,
    FooterComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    FormsModule,
    HttpClientModule,
    MatButtonModule,
    MatCardModule,
    MatDividerModule,
    MatExpansionModule,
    MatIconModule,
    MatInputModule,
    MatFormFieldModule,
    MatMenuModule,
    MatSlideToggleModule,
    MatSnackBarModule,
    MatTabsModule,
    MatToolbarModule,
    MatTreeModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
