#include <stdio.h>

int main(int argc, char const *argv[])
{
    int a[5] = {1, 2, 3, 4, 5};
    int *p[5], i;
    int **pp = p;

    for (i = 0; i < 5; i++)
    {
        p[i] = &a[i];
    }

    for (i = 0; i < 5; i++)
    {
        printf("%d ", *p[i]);
    }
    printf("\n");

    for (i = 0; i < 5; i++, pp++)
    {
        printf("%d ", **pp);
    }

    return 0;
}
