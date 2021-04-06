using namespace std;

#include <iostream>

int main(int argc, char const *argv[])
{
    int *p = new int[10];
    int *q = p + 5;
    cout << "q=" << q << endl;
    q++;
    cout << "(q++)=" << q << endl;
    cout << "(q-p)=" << q - p << endl;
    return 0;
}
