# -*- coding: utf-8 -*-
# __author__ = 'henry'
import unittest

from ddt import data, unpack
from parameterized import parameterized, param

from syntax.calculator import Calculator


class TestCalculator(unittest.TestCase):

    def test_add(self):
        c = Calculator()
        self.assertEqual(c.add(3, 5), 8)

    @parameterized.expand([
        param(3, 5, 8),
        param(1, 2, 3),
        param(2, 3, 5)
    ])
    def test_add_with_parameterized(self, num1, num2, total):
        c = Calculator()
        self.assertEqual(c.add(num1, num2), total)

    @data((3, 5, 8), (1, 2, 3), (2, 2, 4))
    @unpack
    def test_add_with_ddt(self, num1, num2, total):
        c = Calculator()
        self.assertEqual(c.add(num1, num2), total)

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
    unittest.main()
