# -*- coding: utf-8 -*-
# __author__ = 'henry'
import unittest

from syntax.Calculator import Calculator


class TestCalculator(unittest.TestCase):
    def test_add(self):
        c = Calculator()
        self.assertEqual(c.add(3,5), 8)