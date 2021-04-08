using namespace std;

#include <iostream>
#define N 6

int main(int argc, char const *argv[])
{
    int a[6] = {8, 6, 9, 3, 2, 7};
    int iMin, t;

    for (int i = 0; i < N; i++)
    {
        iMin = i;
        for (int j = i + 1; j < N; j++)
        {
            if (a[j] < a[iMin])
            {
                iMin = j;
            }
        }

        if (a[iMin] != a[i])
        {
            t = a[iMin];
            a[iMin] = a[i];
            a[i] = t;
        }
    }

    for (size_t i = 0; i < N; i++)
    {
        cout << a[i] << ' ';
    }

    cout << endl;

    return 0;
}
