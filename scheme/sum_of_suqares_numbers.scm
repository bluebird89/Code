#! /usr/bin/scheme

(define (sum-of-quares-numbers)
    (apply + (map (lambda (x) (* x x)) numbers))

)

(sum-of-quares-numbers '(1 2 3))