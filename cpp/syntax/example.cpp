using namespace std;

#include <iostream>
#include <string>
#include <vector>

#define PI 3.14

int main(int argc, char const *argv[])
{

    vector<string> msg{"Hello", "C++", "World", "from", "VS Code", "and the C++ extension!"};

    for (const string &word : msg)
    {
        cout << word << " ";
    }
    cout << endl;

    double r;
    cout << "Input the radius:";
    cin >> r;
    double s = PI * r * r;
    cout << "The circle's area:" << s << endl;

}
