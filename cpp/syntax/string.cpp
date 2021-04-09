using namespace std;

#include <cstring>
#include <iostream>
#include <stdio.h>

//  字符串与字符数组
int main(int argc, char const *argv[])
{
    char s[18] = "China";
    cout << s << endl
         << "Input string: ";
    cin >> s;
    cout << s << endl;
    strcpy(s, "Japan");
    cout << s << endl;

    for (int i = 0; s[i] != '\0'; i++)
    {
        cout << s[i] << ' ';
    }
    cout << endl;

    char a[5][8] = {"COBO", "ORTRRN", "PSSCAl", " BASIC", " C++"};
    cout << strlen(a[4]) << endl;
    strcat(a[0], a[4]);
    cout
        << a[0] << endl;

    cout << "<-----strring poointer------>" << endl;
    // 字符指针
    char *p = s, ss[80];
    // cout << "Input string:";
    // gets(ss);
    strcpy(p, "Japan");

    // 字符指针数组
    char ac[5][8] = {"COBO", "ORTRRN", "PSSCAl", " BASIC", " C++"};
    char *sp[] = {ac[0], ac[1], ac[3], ac[4]};
    for (int i = 0; i < 4; i++)
    {
        cout << sp[i] << ' ' << sp[i][3] << endl;
    }

    char *f;
    cin >> f;
    cout << f << endl;
    return 0;
}
