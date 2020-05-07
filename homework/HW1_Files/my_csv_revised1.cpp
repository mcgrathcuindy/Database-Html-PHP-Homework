/*
NAME: Christopher McGrath
DATE: Jan 26th, 2020
DESC: CSV table computation program
*/
#include <iostream>
#include <fstream>
#include <vector>
#include <sstream>
#include <string>
#include <cstdlib>
#include <string.h>

using namespace std;
struct student_record {
    int ID;
    string Name;
    int CSCI230;
    int CSCI240;
    int CSCI370;
};

student_record my_records[100];
int size;

using namespace std;
void create();
void read_record(); 
void print_store_record();
void find_student_by_ID(int ID);
void find_student_by_name(string name);
void find_student_max_CSCI370();
void find_max_avg();

int main() {
  int select=-1;
  int temp;
  string s;
  while (select!=0)
    {
      cout<<" 1: Create csv file\n 2: Display\n 3: find by ID\n 4: Find by name\n 5: Find max\n 6: Find max avg\n 0: Quit "<<endl;
      cin>>select;
      if (select==1) create();
      if (select==2) read_record();
      if (select==3)
      {
          printf("\nEnter the ID number of the student you wish to find.\n");
          cin >> temp;
          find_student_by_ID(temp);
      }
      if (select==4)
      {
          printf("\nEnter the name of the student you wish to find.\n");
          cin >> s;
          s = " " + s;
          find_student_by_name(s);
      }
      if (select==5) find_student_max_CSCI370();
      if (select==6) find_max_avg();
      if (select==0) break;
      }
  return 0;
}

void create() 
{ 
  // file pointer 
  fstream fout;
  int n;
  
  // opens an a new CSV file. 
  fout.open("student_grade.csv", ios::out); 
  cout<< "How many students you want to enter:";
  cin>>n;
  cout << "Enter the students information:"<< "Name CSCI230 CSCI240 CSCI370"<< endl; 
  
  int i, CSCI230, CSCI240, CSCI370; 
  string name; 
  
  // Read the input 
  for (i = 0; i < n; i++) { 
    cout << "Enter the details for student "<< i+1 << endl;  
    cout << "Name "<<endl;  
    cin >> name;
    
    cout << "Grade for CSCI230 (100) "<<endl;  
    cin >> CSCI230;
    
    cout << "Grade for CSCI240 (100)"<<endl;  
    cin >> CSCI240;
    
    
    cout << "Grade for CSCI370 (100) "<<endl;  
    cin >> CSCI370;
    
    // Insert the data to file 
    fout << i+1 << ", "
	 << name << ", "
	 << CSCI230 << ", "
	 << CSCI240 << ", "
	 << CSCI370 << ", "
	 << "\n"; 
  } 
} 

void read_record() 
{ 
  
  ifstream file ( "student_grade.csv" );  
  string value;
  int i=0;
  
  while (file.good() )
    {
      getline ( file, value, ',' );  
      cout << value <<endl;
      if (i%5==0) {my_records[size].ID=atoi(value.c_str());}
      if (i%5==1) {my_records[size].Name=value;}
      if (i%5==2) {my_records[size].CSCI230=atoi(value.c_str());}
      if (i%5==3) {my_records[size].CSCI240=atoi(value.c_str());}
      if (i%5==4) {my_records[size].CSCI370=atoi(value.c_str());++size;}
      ++i;
      
      
    }
  cout<<"These are the recorded items collected from the file:"<<endl;
  print_store_record(); 
} 

void print_store_record() 
{ 
  
  for (int i=0;i<size;i++){
      cout<<"Student: "<<i+1 << ", ID:"<< my_records[i].ID<<", Name:"<<my_records[i].Name;
      cout<<", CSCI230: "<< my_records[i].CSCI230<<", CSCI240: "<<my_records[i].CSCI240<<", CSCI370: "<<my_records[i].CSCI370<<endl;
      
    }
  
} 

void find_student_by_ID(int ID){
    cout<<"Student: "<<ID << ", ID:"<< my_records[ID-1].ID<<", Name:"<<my_records[ID-1].Name;
    cout<<", CSCI230: "<< my_records[ID-1].CSCI230<<", CSCI240: "<<my_records[ID-1].CSCI240<<", CSCI370: "<<my_records[ID-1].CSCI370<<endl;
} 

void find_student_by_name(string name){
    int flag = 0;
    for (int i=0;i<size;i++){
        if(my_records[i].Name.compare(name) == 0){
            cout<<"Student: "<<i+1 << ", ID:"<< my_records[i].ID<<", Name:"<<my_records[i].Name;
            cout<<", CSCI230: "<< my_records[i].CSCI230<<", CSCI240: "<<my_records[i].CSCI240<<", CSCI370: "<<my_records[i].CSCI370<<endl;
            flag = 1;
        }
    }
    if(flag != 1)
        cout << "no user with that name found!\n";
}

void find_student_max_CSCI370(){
    int max = my_records[0].CSCI370;
    int IDNO = 0;
    for (int i=0;i<size;i++){
        if(my_records[i].CSCI370 > max){
            max = my_records[i].CSCI370;
            IDNO = i;
        }
    }
    cout << "Student with highest CSCI370 score is:" << my_records[IDNO].Name << endl;
}

void find_max_avg(){
    int max = my_records[0].CSCI370 + my_records[0].CSCI240 + my_records[0].CSCI230;
    int IDNO = 0;
    for (int i=0;i<size;i++){
        if((my_records[i].CSCI370 + my_records[i].CSCI240 + my_records[i].CSCI230) > max){
            max = my_records[i].CSCI370 + my_records[i].CSCI240 + my_records[i].CSCI230;
            IDNO = i;
        }
    }
    cout << "Student with highest average score is:" << my_records[IDNO].Name << endl;
}