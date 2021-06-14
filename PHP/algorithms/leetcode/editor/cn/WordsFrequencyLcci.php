<?php

namespace Algorithms\leetcode\editor\cn;

//设计一个方法，找出任意指定单词在一本书中的出现频率。
//
// 实现应该支持如下操作：
//
//
// WordsFrequency(book)构造函数，参数为字符串数组构成的一本书
// get(word)查询指定单词在书中出现的频率
//
//
// 示例：
//
// WordsFrequency wordsFrequency = new WordsFrequency({"i", "have", "an", "apple
//", "he", "have", "a", "pen"});
//wordsFrequency.get("you"); //返回0，"you"没有出现过
//wordsFrequency.get("have"); //返回2，"have"出现2次
//wordsFrequency.get("an"); //返回1
//wordsFrequency.get("apple"); //返回1
//wordsFrequency.get("pen"); //返回1
//
//
// 提示：
//
//
// book[i]中只包含小写字母
// 1 <= book.length <= 100000
// 1 <= book[i].length <= 10
// get函数的调用次数不会超过100000
//
// Related Topics 设计 哈希表
// 👍 20 👎 0

//leetcode submit region begin(Prohibit modification and deletion)

class WordsFrequency
{
    private $data = [];

    /**
     * @param String[] $book
     */
    public function __construct($book)
    {
        foreach ($book as $word) {
            if ($this->data[$word]) {
                $this->data[$word]++;
            } else {
                $this->data[$word] = 1;
            }
        }
    }

    /**
     * @param String $word
     *
     * @return Integer
     */
    public function get($word)
    {
        return isset($this->data[$word]) ? $this->data[$word] : 0;
    }
}

/**
 * Your WordsFrequency object will be instantiated and called as such:
 * $obj = WordsFrequency($book);
 * $ret_1 = $obj->get($word);
 */
//leetcode submit region end(Prohibit modification and deletion)
