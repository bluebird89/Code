using namespace std;

#include <iostream>

int main(int argc, char const *argv[])
{
    int k = 35, n(0);
    int &b = k;
    cout << k << ' ' << n << ' ' << b << endl;
    b = 40;
    cout << b << ' ' << k << endl;
    return 0;
}
