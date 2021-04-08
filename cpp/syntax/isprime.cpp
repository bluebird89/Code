#include <cmath>
#include <iostream>

using namespace std;

bool isprime(int a)
{
    int i;
    for (i = 2; i < a && a % i != 0; i++)
        ;

    return i == a;
}

int main()
{
    int a = 7, b = 21;
    cout << a << " is prime:" << isprime(7) << " ." << b << " is prime: " << isprime(21) << endl;
    return 0;
}
