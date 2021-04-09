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
    Circle(double x, double y, double r);
    virtual double volume() = 0;
};

Circle::Circle(double x1, double y1, double r1)
{
    x = x1;
    y = y1;
    r = r1;
}

class cylinder : public Circle
{
private:
    double h;

public:
    cylinder(double x, double y, double r, double h);
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
class sphere : public Circle
{
private:
    /* data */
public:
    sphere(int x1, int y1, int r1) : Circle(x1, y1, r1)
    {
    }
    void print()
    {
        Circle::print();
    }
    virtual double volume()
    {
        double R = getr();
        return 3.14 * R * R * R * 3 / 4;
    }
    ~sphere();
};

sphere::~sphere()
{
}

int main()
{
    Circle *p;
    cylinder c(5, 5, 10, 10);
    p = &c;
    p->print();
    cout << "体积：" << p->volume() << endl;

    sphere s(0, 0, 2);
    p = &s;
    p->print();
    cout << "体积：" << p->volume() << endl;
    return 0;
}
