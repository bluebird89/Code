using namespace std;

#include <iostream>

// 最大公约数
int main(int argc, char const *argv[])
{
    int m, n, t, r;
    cin >> m >> n;
    if (m < n)
    {
        t = m;
        m = n;
        n = t;
    }
    while ((r = m % n) != 0)
    {
        m = n;
        n = r;
    }
    cout << n << endl;
    return 0;
}
