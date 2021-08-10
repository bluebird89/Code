#! /usr/bin/guile

(define dot-product (left-evtor right-vector)
    (apply + (map(lambda (x y) (* x y) left-evtor right-vector))))

(dot-product '(1 2 3 4 ) '(5 6 7 8)')