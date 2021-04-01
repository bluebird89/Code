#include <stdio.h>

#define PI 3.14

int main(int argc, char const *argv[])
{
    printf("Interger:\n");
    int int_octal, int_decimal, int_hexadecial;
    int_octal = 012;
    int_decimal = 200;
    int_hexadecial = 0x25;
    short int short_int = -10;
    unsigned long int u_l_int = 200000;

    printf("%d %o %x\n", int_octal, int_octal, int_octal);
    printf("%d %o %x\n", int_decimal, int_decimal, int_decimal);
    printf("%d %o %x\n", int_hexadecial, int_hexadecial, int_hexadecial);

    printf("%d's lenth:%ld\n", short_int, sizeof(short_int));
    printf("%d's lenth:%ld\n", int_decimal, sizeof(int_decimal));
    printf("%ld's lenth:%ld\n", u_l_int, sizeof(u_l_int));

    printf("Float:\n");
    float f = 1234567890.888888;
    double df = 8888888888888.88888888888888888888;
    float r = 5;
    printf("%f's lenth:%ld\n", f, sizeof(f));
    printf("%f's lenth:%ld\n", df, sizeof(df));
    printf("%f %e %g\n", f, f, f);
    printf("s = %f\n", PI * r * r);

    printf("Char:\n");
    int i1, i2;
    char c;
    i1 = 'a' - 'A';
    i2 = 'b' - 'B';
    c = 'c' - 32;
    printf("i1 is %d and c2 is %d\n  \t", i1, i2);
    printf("c is %d and %c\n", c, c);

    printf("String:\n");
    printf("%s\n", "China's in Asia");
    printf("%-5c%-5d%-10.5f\n", c, int_decimal * 10000, f);

    printf("Array:\n");
    int arr[] = {9, 8, 7, 6, 5, 4, 3, 2, 1, 0}, *p3 = NULL, ii;
    for (ii = 0; ii < 10; ii++)
    {
        printf("%d ", arr[ii]);
    }
    printf("\n");

    // 数组名是指针
    for (ii = 0; ii < 10; ii++)
    {
        printf("%d ", *(arr + ii));
    }
    printf("\n");
    // ++ 与 * 优先级相同，自右向左结合
    for (p3 = arr; p3 < arr + 10;)
    {
        printf("%d ", *p3++);
    }
    printf("\n");

    for (p3 = arr; p3 < arr + 10;)
    {
        printf("%d ", *++p3);
    }
    printf("\n");

    int arr2[][4] = {1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12};

    int arr3[][4] = {{1, 2, 3, 4},
                     {5, 6, 7, 8}};
    int b[4][2], i, j;
    for (i = 0; i < 2; i++)
    {
        for (j = 0; j < 4; j++)
        {
            printf("%5d", arr3[i][j]);
            b[j][i] = arr3[i][j];
        }
        printf("\n");
    }
    printf("Array reverse:\n");
    for (i = 0; i < 4; i++)
    {
        for (j = 0; j < 2; j++)
        {
            printf("%5d", b[i][j]);
        }
        printf("\n");
    }

    char str[] = {"hello"};
    char str1[] = "hello";

    char *p = &c;
    char c2 = *p + 1;

    printf("Poniter:\n");
    int a = 100, d = 200;
    int *p1 = &a, *p2 = &d;
    printf("%d,%d\n", a, d);
    printf("%d,%d\n", *p1, *p2);
    printf("%n,%n\n", &a, &d);
    printf("%n,%n\n", p1, p2);

    int *p4[5];

    return 0;
}
