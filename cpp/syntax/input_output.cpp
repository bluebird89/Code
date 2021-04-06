using namespace std;

#include <iostream>

int add(int x, int y)
{
    int z;
    z = x + y;
    return z;
}

int main(int argc, char const *argv[])
{
    int a, b, c;
    cin >> a >> b;
    c = add(a, b);
    cout << c << endl;

    cout << hex << c << endl;

    // cout << 'a' << setw(4) << 'b' << endl;
    return 0;
}
