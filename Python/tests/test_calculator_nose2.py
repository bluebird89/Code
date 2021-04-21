import nose2

from syntax.calculator import Calculator


def test_add():
    c = Calculator()
    result = c.add(3, 5)
    assert result == 8


def test_sub():
    c = Calculator()
    result = c.sub(10, 5)
    assert result == 5


def test_mul():
    c = Calculator()
    result = c.mul(5, 7)
    assert result == 35


def test_div():
    c = Calculator()
    result = c.div(10, 5)
    assert result == 2


if __name__ == '__main__':
    nose2.main()
