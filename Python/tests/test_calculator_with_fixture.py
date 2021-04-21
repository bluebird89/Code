# -*- coding: utf-8 -*-
# __author__ = 'henry'
import unittest

from syntax.calculator import Calculator


class TestCalculatorWithFixture(unittest.TestCase):
    def setUp(self):
        print("test start")

    def tearDown(self):
        print("test end")

    def test_add(self):
        c = Calculator()
        self.assertEqual(c.add(3, 5), 8)

    def test_sub(self):
        c = Calculator()
        self.assertEqual(c.sub(10, 6), 4)

    def test_mul(self):
        c = Calculator()
        self.assertEqual(c.mul(4, 5), 20)

    def test_div(self):
        c = Calculator()
        self.assertEqual(c.div(84, 12), 7)


if __name__ == '__main__':
    # 创建测试套件
    suit = unittest.TestSuite()
    suit.addTest(TestCalculatorWithFixture("test_add"))
    suit.addTest(TestCalculatorWithFixture("test_sub"))
    suit.addTest(TestCalculatorWithFixture("test_mul"))
    suit.addTest(TestCalculatorWithFixture("test_div"))
    # 创建测试运行器
    runner = unittest.TestRunner()
    runner.run(suit)
