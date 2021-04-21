class Solution:
    def removeDuplicates(self, nums) -> int:
        res = []
        for var1 in nums:
            if res.index(var1):
                continue
            res.append(var1)

        return res


if __name__ == '__main__':
    Solution().removeDuplicates([0, 0, 1, 1, 1, 2, 2, 3, 3, 4])
