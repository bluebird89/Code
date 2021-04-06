using namespace std;

#include <iostream>

int main(int argc, char const *argv[])
{
    int mark[100], overn(0), i;
    double aver(0);

    for (i = 0; i < 100; i++)
    {
        mark[i] = rand() % 101;
        aver += mark[i];
    }
    aver = aver / 100;
    for (i = 0; i < 100; i++)
    {
        if (mark[i] >= aver)
        {
            overn++;
        }
    }
    cout << "Average score:" << aver << ". Over the average student count :" << overn
         << endl;

    int arr[] = {1, 3, 5, 7, 9};
    return 0;
}
