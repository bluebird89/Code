#include <cstring>
#include <fstream>
#include <iostream>

using namespace std;

class Mem
{
private:
    char name[20];
    char telno[12];

public:
    void print()
    {
        cout << name << ":" << telno << endl;
    }

    void input()
    {
        cin >> name >> telno;
    }

    char *getname()
    {
        return name;
    }
};
int main()
{
    // 构建通讯录
    // int n;
    // ofstream outf("mem.txt");
    // Mem s;
    // cout << "input person counts:\n";
    // cin >> n;
    // for (int i = 0; i < n; i++)
    // {
    //     s.input();
    //     outf.write((char *)&s, sizeof(s));
    // }
    // outf.close();

    // 通过人名搜索
    char sname[20];
    Mem s;
    cout << "input name to search:";
    cin >> sname;
    ifstream infile("mem.txt");
    while (!infile.eof())
    {
        infile.read((char *)&s, sizeof(s));
        if (strcmp(s.getname(), sname) == 0)
        {
            s.print();
        }
    }
    infile.close();
    return 0;
}
