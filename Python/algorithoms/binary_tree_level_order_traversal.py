
# Definition for a binary tree node.
# class TreeNode:
#     def __init__(self, val=0, left=None, right=None):
#         self.val = val
#         self.left = left
#         self.right = right

class Solution:
    def levelOrder(self, root: TreeNode) -> List[List[int]]:
        ret = []
        def dfs(u, d):
            if u is None:
                return
            # 如果树深超过了ret的长度，那么末尾加入一个空的list
            if d >= len(ret):
                ret.append([])
            # 这里采取的是后序遍历二叉树，其实是一样的
            # 递归孩子节点的时候d+1，也就是树深增加了1
            dfs(u.left, d+1)
            dfs(u.right, d+1)
            # 将当前元素append到ret[d]的list当中
            ret[d].append(u.val)
        dfs(root, 0)
        return ret
