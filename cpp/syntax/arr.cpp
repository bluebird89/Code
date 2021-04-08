using namespace std;

#include <iostream>
#define N 19
void insert(int[], int);
void deleteData(int[], int);
int binary_search(int[], int);
void printArr(int[]);

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

    int arr[] = {1, 3, 5, 7, 9}, *p = arr;
    cout << &arr[3] << ' ' << arr + 3 << ' ' << p + 3 << endl;
    cout << arr[3] << ' ' << *(arr + 3) << ' ' << *(p + 3) << endl;

    int aa[2][3] = {1, 2, 3, 4, 5, 6}, *pp = aa[0], *q[2] = {aa[0], aa[1]};
    cout << *(pp + 5) << ' ' << *(q[1] + 2) << ' ' << *(*(q + 1) + 2) << endl;

    int ia[N] = {};
    for (i = 0; i < (N - 1); i++)
    {
        ia[i] = i * 3 + 1;
    }
    printArr(ia);
    insert(ia, 55);
    deleteData(ia, 28);
    cout << binary_search(ia, 34) << endl;
    return 0;
}

void printArr(int a[])
{
    for (int i = 0; i < N; i++)
    {
        cout << a[i] << ' ';
    }
    cout << endl;
}

void insert(int a[], int data)
{
    int i, j;
    for (i = 0; i < N - 1; i++)
    {
        if (data < a[i])
        {
            break;
        }
    }

    for (j = N - 1; j >= i; j--)
    {
        a[i + 1] = a[i];
    }
    a[i] = data;
    printArr(a);
}
void deleteData(int a[], int data)
{
    int i, j;
    for (i = 0; i < N - 1; i++)
    {
        if (data == a[i])
        {
            break;
        }
    }

    for (j = i; j <= N - 2; j++)
    {
        a[j] = a[j + 1];
    }

    a[N - 1] = 0;
    printArr(a);
}

int binary_search_func(int a[], int data, int low, int high)
{

    int mid = (low + high) / 2;
    if (data == a[mid])
    {
        return mid;
    }
    else if (data > a[mid])
    {
        low = mid + 1;
    }
    else if (data < a[mid])
    {
        high = mid - 1;
    }

    binary_search_func(a, data, low, high);
}
int binary_search(int a[], int data)
{
    int low = 0;
    int high = N - 1;
    return binary_search_func(a, data, low, high);
}