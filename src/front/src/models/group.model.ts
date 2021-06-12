export interface Group {
  id: number;
  name: string;
  imGroot?: Boolean;
  children?: Group[];
  members?: Group[];
}