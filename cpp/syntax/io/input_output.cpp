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

    cout.put('A').put('O').put('K') << endl;
    // cout << 'a' << setw(4) << 'b' << endl;
    char aa[] = "ABCDEFGIJK$MN";
    char *ch = aa;
    cout.write(ch, 10).put('\n');

    char ch1[100];
    cin.read(ch1, 10);
    cout << "\n The string entered is:\n";
    cout.write(ch1, cin.gcount()) << endl;

    int count = 0;
    char cch;
    cout << "Input a characters:" << endl;
    // ctrl +z 结束
    while ((cch = cin.get()) != EOF)
    {
        cout << cch;
        count++;
    }
    cout << count << endl;

    return 0;
}
