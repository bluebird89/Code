using namespace std;

#include <iostream>
#define N 6

int main(int argc, char const *argv[])
{
    int a[6] = {8, 6, 9, 3, 2, 7};
    int t;
    bool tag;

    // 控制遍历次数，因为跟下一个元素比较，需要遍历N-1次
    for (int i = 1; i < N; i++)
    {
        tag = true;
        for (int j = 0; j < N - i; j++)
        {
            if (a[j] > a[j + 1])
            {
                t = a[j];
                a[j] = a[j + 1];
                a[j + 1] = t;
                tag = false;
            }
        }
        if (tag)
        {
            break;
        }
        cout << "\n  " << i << " time sort:";
        for (size_t k = 0; k < N; k++)
        {
            cout << a[k] << ' ';
        }
    }
    cout << endl;
    for (size_t i = 0; i < N; i++)
    {
        cout << a[i] << ' ';
    }

    cout << endl;

    return 0;
}