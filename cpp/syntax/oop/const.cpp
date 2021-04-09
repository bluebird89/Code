#include <cmath>
#include <iostream>

using namespace std;

class Time
{
private:
    int hour, minute, second;
    const int year;

public:
    Time(int y, int h) : year(y), hour(h) {}
    ~Time();
    void settime(int m, int s)
    {
        minute = m;
        second = s;
    }

    int getSecond() const
    {
        return second;
    }

    void print() const
    {
        cout << year << ' ' << hour << " : " << minute << " : " << second << endl;
    }
};

Time::~Time()
{
}

int main()
{
    Time t1(2001, 12);
    t1.settime(10, 49);
    t1.print();

    const Time t2(2020, 15);
    t2.print();

    return 0;
}
