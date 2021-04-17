export interface Group {
  id: number;
  name: string;
  children?: Group[];
}