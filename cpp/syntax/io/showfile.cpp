#include <fstream>
#include <iostream>
#include <stdio.h>
#include <stdlib.h>

using namespace std;

/**
 * @brief 分屏显示指定文件内容
 *
 * @return int
 */
int main()
{
    int r;
    char c;
    char fn[15], buf[100];
    fstream file1;
    cout << "input file name:";
    cin >> fn;
    file1.open(fn, ios::in);
    if (!file1)
    {
        cout << "can't open file";
        abort;
    }

    while (!file1.eof())
    {
        r = 0;
        while (!file1.eof() && r < 23)
        {
            file1.getline(buf, 100);
            cout << buf << endl;
            r++;
        }
        cout << "press any key...";
        c = getchar();
    }
    file1.close();
    return 0;
}
