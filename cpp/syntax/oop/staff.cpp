#include <cmath>
#include <cstring>
#include <iostream>

using namespace std;

class staff
{
private:
    char name[30];
    char sex;
    int wage;
    static int num;

public:
    staff(char *n, char s, int w)
    {
        strcpy(name, n);
        sex = s;
        wage = w;
        num++;
    }
    static int getn()
    {
        return num;
    }
    static void display(staff s)
    {
        cout << s.name << ":" << s.sex << ", " << s.wage << endl;
    }
};

class staff1 : public staff
{
private:
    int wt;

public:
    staff1(char *n, char s, int t, double w) : staff(n, s, w)
    {
        wt = w;
    }

    double addwage()
    {
        return wt / 10 * 80;
    }

    static void display(staff1 s1)
    {
        staff::display(s1);
        cout << s1.wt << " years, add wage:" << s1.addwage() << endl;
    }
};

int staff::num = 0;
int main()
{
    char n1[] = "henry", n2[] = "walcott";
    char *p1 = n1, *q1 = n2;
    staff s1(p1, 'F', 3000), s2(q1, 'F', 4000);
    staff::display(s1);
    staff::display(s2);
    cout << "num of staff is: " << staff::getn() << endl;

    staff1 s3(q1, 'M', 5000, 21.5);
    staff1::display(s3);
    cout << "num of staff is: " << staff1::getn() << endl;
    return 0;
}
