#include <cstring>
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

struct MyStruct1
{
    char dda;
    double dda1;
    int type;
};
//错：sizeof(MyStruct)=sizeof(double)+sizeof(char)+sizeof(int)=13。
//对：当在VC中测试上面结构的大小时，会发现sizeof(MyStruct)为24。

struct man
{
    char name[15];
    char sex;
    int age;
    date birthday;
} m[3];
struct date
{
    int month;
    int day;
    int year;
};

int main()
{
    MyStruct1 instance1;
    MyStruct instance2;
    cout << sizeof(instance1) << ' ' << sizeof(instance2) << endl;
    cout << "没初始化成员变量的情况下：" << s1.add() << endl;
    s1.x = 3;
    s1.y = 4;
    cout << "初始化成员变量的情况下：" << s1.add() << endl;

    strcpy(m[0].name, "henry");
    m[0].sex = 'F';
    m[0].age = 45;
    m[0].birthday.year = 1900;
    m[0].birthday.moth = 4;
    m[0].birthday.day = 14;

    return 0;
}