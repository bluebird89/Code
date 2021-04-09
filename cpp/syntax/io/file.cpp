#include <fstream>
#include <iostream>
#include <stdlib.h>

using namespace std;

int main()
{
    ofstream outfile;
    outfile.open("sample.txt");
    if (!outfile)
    {
        cout << "file can't open" << endl;
        abort();
    }
    char ch = 'a';
    while (ch <= 'z')
    {
        outfile << ch << ' ';
        ch++;
    }
    outfile.close();

    fstream infile("sample.txt", ios::in);
    while (infile >> ch)
    {
        cout << ch;
    }
    cout << endl;

    char s[100];
    ifstream inf("sample.txt");
    while (!inf.eof())
    {
        inf.getline(s, sizeof(s));
        cout << s << endl;
    }

    return 0;
}
