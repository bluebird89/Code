#include <stdio.h>

#include <queue>

int main(int argc, char const *argv[])
{
    std::queue<int> Q;
    if (Q.empty())
    {
        printf("Q is empty!\n");
    }
    Q.push(5);
    Q.push(6);
    Q.push(10);
    printf("Q.front is %d\n", Q.front());
    Q.pop();
    printf("Q.back = %d\n", Q.back());
    printf("Q.size = %ld\n", Q.size());
    return 0;
}
