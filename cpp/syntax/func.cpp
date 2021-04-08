using namespace std;

#include <iostream>
#include <stdio.h>

template <class T>
T power(T x)
{
    return x * x;
}
int max(int a, int b)
{
    int c;
    c = a > b ? a : b;
    return c;
}

float fac(int n)
{
    float f;
    if (n < 0)
    {
        printf("n <0 data errror");
        return -1;
    }
    else if (n == 0 || n == 1)
    {
        f = 1;
    }
    else
    {
        f = n * fac(n - 1);
    }

    return f;
}

void function()
{
    static int a = 0;
    int b = 0;
    a++;
    b++;
    printf("a=%d.b=%d\n", a, b);
}

int gcd(int m, int n)
{
    int r;
    while (r = m % n)
    {
        m = n;
        n = r;
    }
    return n;
}

int sct(int m, int n)
{
    return m * n / gcd(m, n);
}
int main(int argc, char const *argv[])
{
    int i, j = 10, k = 15;
    i = max(j, k);
    printf("input %d and %d. max is %d\n", j, k, i);
    printf("10! = %11.2f\n", fac(10));

    function();
    function();
    function();

    cout << "最大公约数" << gcd(32, 8) << " .最小公倍数" << sct(32, 8) << endl;

    int a = 45, b = 667;
    swap(a, b);
    cout << a << ' ' << b << endl;
    void swapByPointer(int *, int *);
    swapByPointer(&a, &b);
    cout << a << ' ' << b << endl;

    int f(const int *);
    int para = 200;
    cout << f(&para) << ' ' << para << endl;

    char *m, *n;
    m = new char[40];
    n = new char[20];

    char *strcat1(char *, char *);
    cin >>
        m >> n;
    cout << strcat1(m, n) << endl;

    void convert(int, int r = 16);
    convert(45);
    cout << endl;

    int min(int, int);
    double min(double, double);
    int min(int, int, int, int);
    cout << min(100, 50) << ' ' << min(87.45, 56.77) << ' ' << min(1, 2, 3, 4) << endl;

    cout << power(5) << endl;

    return 0;
}

// 引用参数
void swap(int &a, int &b)
{
    int temp = a;
    a = b;
    b = temp;
}
// 指针参数
void swapByPointer(int *a, int *b)
{
    int temp = *a;
    *a = *b;
    *b = temp;
}

// 常指针
int f(const int *p)
{
    int a;
    a = *p;
    return a;
}

char *strcat1(char *s1, char *s2)
{
    char *p = s1;
    while (*p++)
        ;
    --p;
    while (*p++ = *s2++)
        ;
    return s1;
}

int len(int s[])
{
    int i = 0;
    while (s[i] != '\0')
        i++;
    return i;
}

// 十进制转换：默认值 递归
void convert(int m, int r = 16)
{
    char b[17] = "0123456789ABCDEF";
    if (m != 0)
    {
        convert(m / r, r);
        cout << b[m % r];
    }
}

// 重载
int min(int m, int n)
{
    return m >= n ? n : m;
}

double min(double m, double n)
{
    return m >= n ? n : m;
}

int min(int a, int b, int c, int d)
{
    int t1 = min(a, b);
    int t2 = min(c, d);
    return min(t1, t2);
}