using namespace std;

#include <iostream>
#define PRICE 30

int main(int argc, char const *argv[])
{
    int number;
    float discount;
    cout << "Input good's count:";
    cin >> number;

    if (number > 10000)
    {
        discount = 0.3;
    }
    else if (number > 5000)
    {
        discount = 0.2;
    }
    else
    {
        discount = 0;
    };
    cout << PRICE * number * (1 - discount) << endl;

    int i = 1, j = 2, k = 3, x;
    x = (i > 0) ? (j = j * 2) : (k = k * 2);

    char grade;
    scanf("%c", &grade);
    switch (grade)
    {
    case 'A':
        printf("90-100\n");
        break;
    case 'B':
        printf("80-89\n");
        break;
    case 'C':
        printf("70-79\n");
        break;
    case 'D':
        printf("60-69\n");
        break;
    case 'E':
        printf("< 60\n");
        break;
    default:
        printf("You have input wrong score.\n");
        break;
    }

    int sum = 0, c1 = 1;

    while (c1 < 50)
    {
        sum += c1;
        c1++;
    }
    printf("sum is %d.\n", sum);

    int sum1 = 0, c2 = 1;
    do
    {
        sum1 += c2;
        c2++;
    } while (c2 < 50);
    printf("sum is %d.\n", sum1);

    int sum2 = 0;
    for (int i1 = 1; i1 < 50; i1++)
    {
        // 特殊条件跳过，继续执行
        if (i1 == 20)
        {
            printf("%d.\n", i1);
            continue;
        }
        // 终止循环
        if (i1 == 25)
        {
            break;
        }

        sum2 += i1;
    }
    printf("sum is %d.\n", sum2);
}
