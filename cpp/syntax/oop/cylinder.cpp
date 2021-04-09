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
    double getr()
    {
        return r;
    }
    Circle();
    Circle(double x, double y, double r);
    Circle(Circle &p);
    ~Circle();
    virtual double volume()
    {
        return 0;
    }
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

class cylinder : public Circle
{
private:
    double h;

public:
    cylinder(double x, double y, double r, double h);
    ~cylinder();
    void print()
    {
        Circle::print();
        cout << "Cylinder height:" << h << endl;
    }
    virtual double volume()
    {
        double R = getr();
        return 3.14 * R * R * h;
    }
};

cylinder::cylinder(double x1, double y1, double r1, double h1) : Circle(x1, y1, r1)
{
    h = h1;
}

cylinder::~cylinder()
{
}

void f(Circle &p)
{
    cout << "volume: " << p.volume() << endl;
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

    cylinder c1(5, 5, 10, 10);
    c1.print();
    f(c1);
    return 0;
}
