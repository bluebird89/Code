<?php

namespace Algorithms\leetcode\editor\cn;

//给定一个数组 nums 和滑动窗口的大小 k，请找出所有滑动窗口里的最大值。
//
// 示例:
//
// 输入: nums = [1,3,-1,-3,5,3,6,7], 和 k = 3
// 输出: [3,3,5,5,6,7]
// 解释:
//
//  滑动窗口的位置                最大值
//---------------               -----
//[1  3  -1] -3  5  3  6  7       3
// 1 [3  -1  -3] 5  3  6  7       3
// 1  3 [-1  -3  5] 3  6  7       5
// 1  3  -1 [-3  5  3] 6  7       5
// 1  3  -1  -3 [5  3  6] 7       6
// 1  3  -1  -3  5 [3  6  7]      7
//
//
//
// 提示：
//
// 你可以假设 k 总是有效的，在输入数组不为空的情况下，1 ≤ k ≤ 输入数组的大小。
//
// 注意：本题与主站 239 题相同：https://leetcode-cn.com/problems/sliding-window-maximum/
// Related Topics 队列 Sliding Window
// 👍 268 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

class Solution
{

    /**
     * @param  Integer[]  $nums
     * @param  Integer    $k
     *
     * @return Integer[]
     */
    public static function maxSlidingWindow($nums, $k)
    {
        $n = count($nums);
        if ($n < 1) {
            return $nums;
        }
//        双向列列:存储下标
        $queue = [];
        $result = [];

        for ($i = 0; $i < $n; $i++) {
            while (!empty($queue) && $nums[end($queue)] <= $nums[$i]) {
                array_pop($queue);
            }
            $queue[] = $i;

            //如果队首(队列最大的元素)的下标小于当前窗口的左边界，说明队首元素是无效的，需要把队首元素出队
            if ($queue[0] < $i + 1 - $k) {
                array_shift($queue);
            }

            //如果窗口已经形成，就把窗口最大的元素(队首)放入结果集
            if ($i + 1 >= $k) {
                $result[] = $nums[$queue[0]];
            }
        }

        return $result;
    }

    public static function maxSlidingWindow1($nums, $k)
    {
        $head = 1;
        $tail = 0;
        $n = count($nums);
        $q = [];
        $res = [];
        for ($i = 1; $i <= $n; $i++) {
            // 去尾:队尾元素出队,队列非空且待入队元素大于队列尾元素
            while ($head <= $tail && $nums[$i] >= $q[$tail]) {
                array_pop($q);
            }
            array_push($q, $nums[$i]);

            // 队头元素出队：队列非空且 index小于 i-k+1(或者说 index小于等于 i-k)
            while ($q[$head] <= $i - $k) {
                $head++;// 删头操作
            }
            if ($i >= $k) {
                $res[] = $q[$head];
            }
        }
    }

//    public function maxSlidingWindow()
//    {
//
//    head=1,tail=0;
//    for(int i=1;i<=n;i++)
//    {
//        while(head<=tail && a[i]<=q[tail].val)tail--;
//        q[++tail].id=i;
//        q[tail].val=a[i];
//
//        while(q[head].id<=i-k)head++;
//        if(i>=k)printf("%d ",q[head].val);
//    }
//    printf("\n");
//}
//    }
}

//leetcode submit region end(Prohibit modification and deletion)
print_r(Solution::maxSlidingWindow([1, 3, -1, -3, 5, 3, 6, 7], 3));
