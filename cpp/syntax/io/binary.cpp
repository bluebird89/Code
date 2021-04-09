#include <cmath>
#include <fstream>
#include <iostream>
#include <stdlib.h>

using namespace std;

struct student
{
    int num;
    char name[20];
    double score;
};

int main()
{
    const int n = 5;
    student stu[5];
    ofstream outfile;
    outfile.open("binary.txt", ios::binary);
    if (!outfile)
    {
        cout << "Can't open file! " << endl;
        abort();
    }
    for (int i = 0; i < n; i++)
    {
        cout << "input num,name,score:\n";
        cin >> stu[i].num >> stu[i].name >> stu[i].score;
        outfile.write((char *)&stu[i], sizeof(student));
    }
    outfile.close();

    ifstream infile;
    infile.open("binary.txt", ios::binary);
    if (!infile)
    {
        cout << "Can't open file! " << endl;
        abort();
    }

    // 写指针
    infile.seekg(2 * sizeof(student), ios::beg);
    cout << "file pointer position after beginning " << infile.tellg() << " byte" << endl;
    for (int i = 0; i < n - 2; i++)
    {
        infile.read((char *)&stu[i], sizeof(student));
        cout << stu[i].num << "," << stu[i].name << "," << stu[i].score << endl;
    }

    return 0;
}
