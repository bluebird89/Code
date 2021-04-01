#include <stdio.h>

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

int main(int argc, char const *argv[])
{
    int i, j = 10, k = 15;
    i = max(j, k);
    printf("i=%d\n", i);
    printf("10! = %10.0f\n", fac(10));

    function();
    function();
    function();
    return 0;
}
