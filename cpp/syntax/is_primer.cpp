using namespace std;

#include <iostream>

int main(int argc, char const *argv[])
{
    for (int i = 2; i <= 100; i++)
    {
        for (int j = 2; j <= i - 1; j++)
        {
            if (i % j == 0)
                break;
            if (j == i - 1)
            {
                cout << i << '\t';
            }
        }
    }

    return 0;
}
