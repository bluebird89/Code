<?php

namespace Algorithms\leetcode\editor\cn;

//运用所掌握的数据结构，设计和实现一个 LRU (最近最少使用) 缓存机制 。
//
// 实现 LRUCache 类：
// LRUCache(int capacity) 以正整数作为容量 capacity 初始化 LRU 缓存
//
// int get(int key) 如果关键字 key 存在于缓存中，则返回关键字的值，否则返回 -1 。
//
// void put(int key, int value)
// 如果关键字已经存在，则变更其数据值；
// 如果关键字不存在，则插入该组「关键字-值」。
// 当缓存容量达到上限时，应该在写入新数据之前删除最久未使用的数据值，从而为新的数据值留出空间。
//
// 示例：
//
//输入
//["LRUCache", "put", "put", "get", "put", "get", "put", "get", "get", "get"]
//[[2], [1, 1], [2, 2], [1], [3, 3], [2], [4, 4], [1], [3], [4]]
//输出
//[null, null, null, 1, null, -1, null, -1, 3, 4]
//
//解释
//LRUCache lRUCache = new LRUCache(2);
//lRUCache.put(1, 1); // 缓存是 {1=1}
//lRUCache.put(2, 2); // 缓存是 {1=1, 2=2}
//lRUCache.get(1);    // 返回 1
//lRUCache.put(3, 3); // 该操作会使得关键字 2 作废，缓存是 {1=1, 3=3}
//lRUCache.get(2);    // 返回 -1 (未找到)
//lRUCache.put(4, 4); // 该操作会使得关键字 1 作废，缓存是 {4=4, 3=3}
//lRUCache.get(1);    // 返回 -1 (未找到)
//lRUCache.get(3);    // 返回 3
//lRUCache.get(4);    // 返回 4
//
// 提示：
//
// 1 <= capacity <= 3000
// 0 <= key <= 3000
// 0 <= value <= 104
// 最多调用 3 * 104 次 get 和 put
//
// 进阶：是否可以在 O(1) 时间复杂度内完成这两种操作？

//leetcode submit region begin(Prohibit modification and deletion)
class LRUCache
{
    private $cap;
    private $data = [];

    /**
     * @param Integer $capacity
     */
    public function __construct($capacity)
    {
        $this->cap = $capacity;
    }

    /**
     *  update index
     *
     * @param Integer $key
     *
     * @return Integer
     */
    public function get($key)
    {
        $ret_value = -1;

        if (isset($this->data[$key])) {
            $ret_value = $this->data[$key];
            unset($this->data[$key]);
            $this->data[$key] = $ret_value;
        }

        return $ret_value;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     *
     * @return NULL
     */
    public function put($key, $value)
    {
        // 如果存在，移动队尾，先删除，后追加
        if (isset($this->data[$key])) {
            unset($this->data[$key]);
        } else {
            //  not exist 长度检查，超长则删除首元素
            if (count($this->data) >= $this->cap) {
//                unset($this->data[array_key_first($this->data)]);
                unset($this->data[key($this->data)]);
            }
        }

        $this->data[$key] = $value;
    }

    public function vardump_cache()
    {
        var_dump($this->data);
    }
}

/**
 * Your LRUCache object will be instantiated and called as such:
 * $obj = LRUCache($capacity);
 * $ret_1 = $obj->get($key);
 * $obj->put($key, $value);
 */
//leetcode submit region end(Prohibit modification and deletion)
$lru = new LRUCache(2);
$lru->put(1, 0);
echo $lru->get(1) . PHP_EOL;
$lru->vardump_cache();

$lru->put(2, 2);
echo $lru->get(2) . PHP_EOL;
$lru->vardump_cache();

$lru->put(4, 4);
echo $lru->get(1) . PHP_EOL;
$lru->vardump_cache();

echo $lru->get(3) . PHP_EOL;
$lru->vardump_cache();
echo $lru->get(4) . PHP_EOL;
$lru->vardump_cache();
