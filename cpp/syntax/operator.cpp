#include <stdio.h>

int main(int argc, char const *argv[])
{
    printf("赋值、算术运算、自增、类型转换、逗号：\n");
    int a, b, c, d, e = (3 * 5, 6 + 9, 30);
    a = 10;
    b = a++;
    c = ++a;
    d = 10 * a++;

    float f = (double)d;
    printf("b,c,d:%d,%d,%d,%d,%f", b, c, d, e, f);

    // 交换变量
    int int1 = 1, int2 = 2;
    a = a + b;
    b = a - b;
    a = a - b;

    return 0;
}
