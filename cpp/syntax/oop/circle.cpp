#include <cmath>
#include <iostream>

using namespace std;

class Circle
{
private:
    double x, y, r, s;

public:
    void print()
    {
        cout << "圆心：（" << x << ',' << y << ") "
             << "半径：" << r << endl;
    }
    void area()
    {
        cout << "面积：" << 3.14 * r * r << endl;
    }
    Circle();
    Circle(double x, double y, double r);
    Circle(Circle &p);
    ~Circle();

    friend double dist(Circle c1, Circle c2);
};

double dist(Circle c1, Circle c2)
{
    return sqrt((c1.x - c2.x) * (c1.x - c2.x) + (c1.y - c2.y) * (c1.y - c2.y));
}
Circle::Circle() {}
Circle::Circle(double x1, double y1, double r1)
{
    x = x1;
    y = y1;
    r = r1;
}
Circle::Circle(Circle &p)
{
    x = p.x;
    y = p.y;
    r = p.r;
}

Circle::~Circle()
{
}

int main()
{
    Circle c(1, 1, 5), p;
    c.print();
    c.area();

    p.print();

    static Circle p1;
    p1.print();

    Circle p2(c);
    p2.print();

    Circle p3(5, 5, 10);

    cout << dist(c, p3) << endl;
    return 0;
}
