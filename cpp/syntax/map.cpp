#include <stdio.h>

#include <map>

struct RandomListNode
{
    int label;
    RandomListNode *next, *random;
    RandomListNode(int x) : label(x), next(NULL), random(NULL) {}
};

int main(int argc, char const *argv[])
{
    std::map<RandomListNode *, int> node_map;
    RandomListNode a(5);
    RandomListNode b(3);
    RandomListNode c(6);
    a.next = &b;
    b.next = &c;
    a.random = &c;
    b.random = &a;
    c.random = &c;
    node_map[&a] = 1;
    node_map[&b] = 2;
    node_map[&c] = 3;

    printf("a.random id = %d\n", node_map[a.random]);
    printf("b.random id = %d\n", node_map[b.random]);
    printf("c.random id = %d\n", node_map[c.random]);
    return 0;
}
