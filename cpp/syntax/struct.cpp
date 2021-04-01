#include <iostream>

using namespace std;

struct SAMPLE
{
    int x;
    int y;
    int add() { return x + y; }
} s1;

struct MyStruct
{
    double dda1;
    char dda;
    int type;
};
//错：sizeof(MyStruct)=sizeof(double)+sizeof(char)+sizeof(int)=13。
//对：为了对齐，要进行偏移，当在VC中测试上面结构的大小时，会发现sizeof(MyStruct)为16。

struct MyStruct
{
    char dda;
    double dda1;
    int type;
};
//错：sizeof(MyStruct)=sizeof(double)+sizeof(char)+sizeof(int)=13。
//对：当在VC中测试上面结构的大小时，你会发现sizeof(MyStruct)为24。

int main()
{
    cout << "没初始化成员变量的情况下：" << s1.add() << endl;
    s1.x = 3;
    s1.y = 4;
    cout << "初始化成员变量的情况下：" << s1.add() << endl;
    system("pause");
    return 0;
}