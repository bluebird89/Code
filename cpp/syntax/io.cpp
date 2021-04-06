#include <stdio.h>

int main(int argc, char const *argv[])
{
    printf("Standard Output:\n");
    char c1, c2, c3;
    c1 = 'H';
    c2 = 'i';
    putchar(c1);
    putchar(c2);
    putchar('\n');
    putchar(97);
    putchar('b');
    printf("\nInput a char:\n");
    c3 = getchar();
    putchar(c3);
    c3 = getchar();
    putchar(c3);

    printf("%-10ld\n", 345352345234345);

    int i;
    char c;
    float f;

    // 输入：45 c 12.45
    scanf("%d%c%f", &i, &c, &f);
    printf("%d %c %f", i, c, f);
    scanf("%d，%c，%f", &i, &c, &f);
    printf("%d %c %f", i, c, f);
    return 0;
}
