## 测试

* 超出时间限制

## 纯编程题|模拟题|翻译题

* [x] [1. 两数之和](https://leetcode-cn.com/problems/two-sum/)（简单） 两层for循环，或者用Map解决，或排序+双指针
* [x] [1108. IP 地址无效化](https://leetcode-cn.com/problems/defanging-an-ip-address/)（简单） 简单字符串替换
* [x] [344. 反转字符串](https://leetcode-cn.com/problems/reverse-string/)（简单）真的就是反转字符串
* [x] [剑指 Offer 58 - I. 翻转单词顺序](https://leetcode-cn.com/problems/fan-zhuan-dan-ci-shun-xu-lcof/)（简单） 反转两次
* [x] [125. 验证回文串](https://leetcode-cn.com/problems/valid-palindrome/) （简单） 比普通的验证回文串稍微复杂一点点
* [x] [9. 回文数](https://leetcode-cn.com/problems/palindrome-number/)（简单）需要先将数字转化成字符串数组
* [x] [58. 最后一个单词的长度](https://leetcode-cn.com/problems/length-of-last-word/)（简单） 从后往前扫描更简单
* [ ] [剑指 Offer 05. 替换空格](https://leetcode-cn.com/problems/ti-huan-kong-ge-lcof/)（简单） 字符串中元素替换，减少数组元素的搬移
* [x] [剑指 Offer 58 - II. 左旋转字符串](https://leetcode-cn.com/problems/zuo-xuan-zhuan-zi-fu-chuan-lcof/)（简单） 纯数组搬移数据
* [x] [26. 删除排序数组中的重复项](https://leetcode-cn.com/problems/remove-duplicates-from-sorted-array/)（简单）顺序扫描 下标操作
* [x] [剑指 Offer 67. 把字符串转换成整数](https://leetcode-cn.com/problems/ba-zi-fu-chuan-zhuan-huan-cheng-zheng-shu-lcof/)（中等）经典atoi()，注意范围越界处理

## 找规律题

* [x] [面试题 01.08. 零矩阵](https://leetcode-cn.com/problems/zero-matrix-lcci/) （简单）
* [x] [面试题 16.11. 跳水板](https://leetcode-cn.com/problems/diving-board-lcci/)（简单）
* [x] [面试题 01.05. 一次编辑](https://leetcode-cn.com/problems/one-away-lcci/)（中等）
* [] [面试题 16.15. 珠玑妙算](https://leetcode-cn.com/problems/master-mind-lcci/) （简单）
    - [代码](./editor/cn/.php)
* [ ] [面试题 16.04. 井字游戏](https://leetcode-cn.com/problems/tic-tac-toe-lcci/)（中等）
* [x] [55. 跳跃游戏](https://leetcode-cn.com/problems/jump-game/) （中等）
* [x] [48. 旋转图像](https://leetcode-cn.com/problems/rotate-image/) （中等）经典
* [ ] [54. 螺旋矩阵](https://leetcode-cn.com/problems/spiral-matrix/)（中等）经典
    - 确定四条边位置
    - 顺时针螺旋取值
    - 修改边界位置
* [x] [240. 搜索二维矩阵 II](https://leetcode-cn.com/problems/search-a-2d-matrix-ii/) （中等）经典

## 链表

* [x] [203. 移除链表元素](https://leetcode-cn.com/problems/remove-linked-list-elements/) （简单）
* [x] [876. 链表的中间结点](https://leetcode-cn.com/problems/middle-of-the-linked-list/)（简单）
* [x] [83. 删除排序链表中的重复元素](https://leetcode-cn.com/problems/remove-duplicates-from-sorted-list/)（简单）
* [x] [剑指 Offer 25. 合并两个排序的链表](https://leetcode-cn.com/problems/he-bing-liang-ge-pai-xu-de-lian-biao-lcof/) （中等）
* [x] [2. 两数相加](https://leetcode-cn.com/problems/add-two-numbers/) （中等）
* [x] [206. 反转链表](https://leetcode-cn.com/problems/reverse-linked-list/) （中等）
* [x] [234. 回文链表](https://leetcode-cn.com/problems/palindrome-linked-list/) （中等）
    - 快慢指针获取中间位置
    - 翻转后半段
* [x] [328. 奇偶链表](https://leetcode-cn.com/problems/odd-even-linked-list/)（中等）
* [] [25. K 个一组翻转链表](https://leetcode-cn.com/problems/reverse-nodes-in-k-group/)（困难）
* [x] [剑指 Offer 22. 链表中倒数第k个节点](https://leetcode-cn.com/problems/lian-biao-zhong-dao-shu-di-kge-jie-dian-lcof/) （简单）
    - 快慢指针
* [] [19. 删除链表的倒数第 N 个结点](https://leetcode-cn.com/problems/remove-nth-node-from-end-of-list/) （中等）
    - [](editor/cn/RemoveNthNodeFromEndOfList.php)
    - 逆向思维:len-N
    - 快慢指针
* [] [160. 相交链表](https://leetcode-cn.com/problems/intersection-of-two-linked-lists/)（简单）
    - 长链表先走一定长度，同步长度
* [x] [141. 环形链表](https://leetcode-cn.com/problems/linked-list-cycle/)（简单）

## 栈和队列

* [x] [剑指 Offer 09. 用两个栈实现队列](https://leetcode-cn.com/problems/yong-liang-ge-zhan-shi-xian-dui-lie-lcof/)（简单）
* [x] [225. 用队列实现栈](https://leetcode-cn.com/problems/implement-stack-using-queues/)（简单）
* [x] [面试题 03.05. 栈排序](https://leetcode-cn.com/problems/sort-of-stacks-lcci/)（中等）
* [] [155. 最小栈](https://leetcode-cn.com/problems/min-stack/)（简单）
    - Method 1:maintiance a min stack by defferent order
    - Method 2:maintaince a array with top=>min
* [x][面试题 03.01. 三合一](https://leetcode-cn.com/problems/three-in-one-lcci/)（简单）
* [x] [20. 有效的括号](https://leetcode-cn.com/problems/valid-parentheses/)（简单）
* [] [面试题 16.26. 计算器](https://leetcode-cn.com/problems/calculator-lcci/)（中等）
    - TODO:执行字符串
* [O] [772. 基本计算器 III](https://leetcode-cn.com/problems/basic-calculator-iii/)（困难 包含括号 力扣会员）
* [x] [1047. 删除字符串中的所有相邻重复项](https://leetcode-cn.com/problems/remove-all-adjacent-duplicates-in-string/)（简单）
* [x] [剑指 Offer 31. 栈的压入、弹出序列](https://leetcode-cn.com/problems/zhan-de-ya-ru-dan-chu-xu-lie-lcof/)（中等）
    - first understand the question
* 以下选做，在有时间有精力之后再刷
    * [x] [739. 每日温度](https://leetcode-cn.com/problems/daily-temperatures/)（中等） 单调栈
    * [] [42. 接雨水](https://leetcode-cn.com/problems/trapping-rain-water/)（困难）单调栈
    * [] [84. 柱状图中最大的矩形](https://leetcode-cn.com/problems/largest-rectangle-in-histogram/)（困难）单调栈
    * [] [面试题 03.06. 动物收容所](https://leetcode-cn.com/problems/animal-shelter-lcci/)（中等） 队列
    * [] [剑指 Offer 59 - II. 队列的最大值](https://leetcode-cn.com/problems/dui-lie-de-zui-da-zhi-lcof/)（中等） 单调队列
    * [x] [剑指 Offer 59 - I. 滑动窗口的最大值](https://leetcode-cn.com/problems/hua-dong-chuang-kou-de-zui-da-zhi-lcof/) （困难）单调队列
        - 理解错误： max of sum of k's number 
        - 单调队列

## 递归与分治

* [x] [剑指 Offer 10- I. 斐波那契数列](https://leetcode-cn.com/problems/fei-bo-na-qi-shu-lie-lcof/) （简单）
    - TODO:尾递归原理
* [x] [剑指 Offer 10- II. 青蛙跳台阶问题](https://leetcode-cn.com/problems/qing-wa-tiao-tai-jie-wen-ti-lcof/)（简单）
    - TODO:尾递归&&迭代优化
* [x] [面试题 08.01. 三步问题](https://leetcode-cn.com/problems/three-steps-problem-lcci/) （简单）
    - [](editor/cn/ThreeStepsProblemLcci.php)
    - 正常超时，用备忘录
    - 非递归
        + 迭代
* [x] [剑指 Offer 06. 从尾到头打印链表](https://leetcode-cn.com/problems/cong-wei-dao-tou-da-yin-lian-biao-lcof/) （简单）
    - [](editor/cn/CongWeiDaoTouDaYinLianBiaoLcof.php)
* [x] [剑指 Offer 24. 反转链表](https://leetcode-cn.com/problems/fan-zhuan-lian-biao-lcof/) （简单）
    - [](editor/cn/FanZhuanLianBiaoLcof.php)
* [x] [剑指 Offer 16. 数值的整数次方](https://leetcode-cn.com/problems/shu-zhi-de-zheng-shu-ci-fang-lcof/) （中等）
    - [](editor/cn/ShuZhiDeZhengShuCiFangLcof.php)
* [x] [面试题 08.05. 递归乘法](https://leetcode-cn.com/problems/recursive-mulitply-lcci/) （中等）
    - [](editor/cn/RecursiveMulitplyLcci.php)

## 排序

* [x] [面试题 10.01. 合并排序的数组](https://leetcode-cn.com/problems/sorted-merge-lcci/) （简单）
    - [](editor/cn/SortedMergeLcci.php)
        - 双指针实现
* [] [21. 合并两个有序链表](https://leetcode-cn.com/problems/merge-two-sorted-lists/) （简单）
* [] [242. 有效的字母异位词](https://leetcode-cn.com/problems/valid-anagram/)（简单）
* [x] [1502. 判断能否形成等差数列](https://leetcode-cn.com/problems/can-make-arithmetic-progression-from-sequence/)（简单）
    - [](editor/cn/CanMakeArithmeticProgressionFromSequence.php)
    - TODO: need sort by self
* [O] [252. 会议室](https://leetcode-cn.com/problems/meeting-rooms/) （简单）
* [] [56. 合并区间](https://leetcode-cn.com/problems/merge-intervals/)（中等）
* [x] [剑指 Offer 21. 调整数组顺序使奇数位于偶数前面](https://leetcode-cn.com/problems/diao-zheng-shu-zu-shun-xu-shi-qi-shu-wei-yu-ou-shu-qian-mian-lcof/) （简单）
    - [](editor/cn/DiaoZhengShuZuShunXuShiQiShuWeiYuOuShuQianMianLcof.php)
* [] [75. 颜色分类](https://leetcode-cn.com/problems/sort-colors/)（中等）
* [] [147. 对链表进行插入排序](https://leetcode-cn.com/problems/insertion-sort-list/)（中等）
* [] [148. 排序链表](https://leetcode-cn.com/problems/sort-list/)（中等） 链表上的归并排序
* [] [215. 数组中的第K个最大元素](https://leetcode-cn.com/problems/kth-largest-element-in-an-array/)（中等）
* [] [面试题 17.14. 最小K个数](https://leetcode-cn.com/problems/smallest-k-lcci/) （中等）
* [] [剑指 Offer 51. 数组中的逆序对](https://leetcode-cn.com/problems/shu-zu-zhong-de-ni-xu-dui-lcof/)（困难）
    - [](editor/cn/ShuZuZhongDeNiXuDuiLcof.php)

## 二分

* [x] [704. 二分查找](https://leetcode-cn.com/problems/binary-search/)（简单） 标准二分查找
* [x] [374. 猜数字大小](https://leetcode-cn.com/problems/guess-number-higher-or-lower/)（简单）
    - 题意：猜的数字是代码生成
* [x] [744. 寻找比目标字母大的最小字母](https://leetcode-cn.com/problems/find-smallest-letter-greater-than-target/)（简单）
* [x] [35. 搜索插入位置](https://leetcode-cn.com/problems/search-insert-position/)（简单）
* [] [34. 在排序数组中查找元素的第一个和最后一个位置](https://leetcode-cn.com/problems/find-first-and-last-position-of-element-in-sorted-array/) （中等）
* [] [面试题 10.05. 稀疏数组搜索](https://leetcode-cn.com/problems/sparse-array-search-lcci/)（简单）
* [] [33. 搜索旋转排序数组](https://leetcode-cn.com/problems/search-in-rotated-sorted-array/)（中等）无重复数据
* [x] [153. 寻找旋转排序数组中的最小值](https://leetcode-cn.com/problems/find-minimum-in-rotated-sorted-array/)（中等） 无重复数据
    - [](editor/cn/FindMinimumInRotatedSortedArray.php)
* [x] [852. 山脉数组的峰顶索引](https://leetcode-cn.com/problems/peak-index-in-a-mountain-array/)（简单）峰值二分
* [x] [162. 寻找峰值](https://leetcode-cn.com/problems/find-peak-element/)（中等）峰值二分
* [x] [367. 有效的完全平方数](https://leetcode-cn.com/problems/valid-perfect-square/)（简单）二分答案
* [x] [69. x 的平方根](https://leetcode-cn.com/problems/sqrtx/)（简单）二分答案
* [0] [74. 搜索二维矩阵](https://leetcode-cn.com/problems/search-a-2d-matrix/)（中等） 二维转一维，二分查找
* 以下为选做：
* [] [658. 找到 K 个最接近的元素](https://leetcode-cn.com/problems/find-k-closest-elements/)（中等）
* [] [875. 爱吃香蕉的珂珂](https://leetcode-cn.com/problems/koko-eating-bananas/)（中等）二分答案
* [] [81. 搜索旋转排序数组 II](https://leetcode-cn.com/problems/search-in-rotated-sorted-array-ii/)（中等）有重复数据
* [] [154. 寻找旋转排序数组中的最小值 II](https://leetcode-cn.com/problems/find-minimum-in-rotated-sorted-array-ii/) （困难） 有重复数据

## 哈希表

* [] [两数之和](https://leetcode-cn.com/problems/two-sum/) （简单）
* [] [15. 三数之和](https://leetcode-cn.com/problems/3sum/)（中等）
* [] [160. 相交链表](https://leetcode-cn.com/problems/intersection-of-two-linked-lists/)（简单）
* [] [141. 环形链表](https://leetcode-cn.com/problems/linked-list-cycle/)（简单）
* [] [面试题 02.01. 移除重复节点](https://leetcode-cn.com/problems/remove-duplicate-node-lcci/)（中等）
* [] [面试题 16.02. 单词频率](https://leetcode-cn.com/problems/words-frequency-lcci/) （简单）
* [] [面试题 01.02. 判定是否互为字符重排](https://leetcode-cn.com/problems/check-permutation-lcci/)（简单）
* [] [剑指 Offer 03. 数组中重复的数字](https://leetcode-cn.com/problems/shu-zu-zhong-zhong-fu-de-shu-zi-lcof/) （简单）
* [] [242. 有效的字母异位词](https://leetcode-cn.com/problems/valid-anagram/)（简单）
* [] [49. 字母异位词分组](https://leetcode-cn.com/problems/group-anagrams/)（中等）
* [] [136. 只出现一次的数字](https://leetcode-cn.com/problems/single-number/)（简单）
* [] [349. 两个数组的交集](https://leetcode-cn.com/problems/intersection-of-two-arrays/) （简单）
* [] [1122. 数组的相对排序](https://leetcode-cn.com/problems/relative-sort-array/)（中等）
* [] [706. 设计哈希映射](https://leetcode-cn.com/problems/design-hashmap/)（简单）
* [] [146. LRU 缓存机制](https://leetcode-cn.com/problems/lru-cache/) （中等）标准的LRU
* [] [面试题 16.21. 交换和](https://leetcode-cn.com/problems/sum-swap-lcci/)（中等）

## 额外

* 给你n张纸片，正反面写有字母。问怎样排列这些纸片，能够排出来给定的句子。所有纸片都要用到。这是个permutation问题，用dfs可以， 看评论说这道题可以用trie优化，求用trie优化的思路。
* 两个file，一个file是text，另一个file是words。 要把第二个file里的单词从第一个file里去掉。  followup: 多线程， 分布式怎么弄  
