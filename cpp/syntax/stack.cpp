#include <stdio.h>

#include <stack>

main(int argc, char const *argv[])
{
    std::stack<int> s;
    if (s.empty())
    {
        printf("s is empty!\n");
    }
    s.push(5);
    s.push(6);
    printf("s.top =%d\n", s.top());
    s.pop();
    printf("s.top =%d\n", s.top());
    printf("s.top =%ld\n", s.size());
    return 0;
}
