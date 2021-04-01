#include <stdio.h>

int main(int argc, char const *argv[])
{
    int x, y, sum;
    x = 100;
    y = 200;

    sum = x + y;
    printf("sum is %d:", sum);

    printf("argc is %d\n", argc);
    //int i;
    for (int i1 = 0; i1 < argc; i1++)
    {
        printf("argv[%d]is %s\n", i, argv[i1]);
    }

    int i, j;
    printf("input the int value i:\n");
    scanf("%d", &i); //默认输入流是键盘
    printf("input the int value j:\n");
    scanf("%d", &j);
    if (0 != j)
    {
        printf("%d/%d=%d\n", i, j, i / j);
    }
    else
    {
        fprintf(stderr, "j != 0\n");
        return 1;
    }

    int flag = 1;
    int i2;
    int s = 0;
    int count = 0;
    while (flag)
    {
        scanf("%d", &i2);
        if (0 == i2)
            break;
        //等于零跳出 count++;
        s += i2;
    }
    printf("%d,%d\n", s, count);

    return 0;
}
