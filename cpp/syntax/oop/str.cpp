#include <cmath>
#include <cstdio>
#include <cstring>
#include <iostream>

using namespace std;

class str
{
private:
    char *s;
    int len;

public:
    str(/* args */);
    ~str();
    str(char *s1)
    {
        len = strlen(s1);
        s = new char[len];
        strcpy(s, s1);
    }
    void print()
    {
        cout << s << endl;
    }
    // 静态重载
    str operator+(str s1)
    {
        return strcat(s, s1.s);
    }

    // friend bool operator>=(str s1, str s2)
};

str::str(/* args */)
{
}

str::~str()
{
}

// friend str operator>=(str s1, str s2)
// {
//     return false;
// }

int main()
{
    char str1[100] = "China", str2[100] = "Japan";

    str s1(str1), s2(str2), s3;
    s3 = s1 + s2;
    s3.print();

    return 0;
}
