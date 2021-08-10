#! /usr/bin/guile -s
!#

; this is a scheme comment line.

#!
there are scheme comment area.
you can write mulity lines here .
!#

# form
(define x 123)
(+ 1 2)
(* 4 5 6)
(display "hello world")

# variable
(define x 123)
(set! x "hello")

# boolean
(not #f)
(not (list 1 2 3))
(not 'a)

# number  二进制的 #b1010 ，八进制的 #o567，十进制的123或 #d123，十六进制的 #x1afc
# 复数型(complex)
(define c 3+2i)
# 实数型（real）
(define f 22/7)
# 有理数型（rational）
(define p 3.1415)
# 整数型(integer)
(define i 123)

## char 以符号组合 "#\" 开始，表示单个字符
#\space
#\newline
#\A

## symbol 可以是单词，用括号括起来的多个单词，也可以是无意义的字母组合或符号组合，它在某种意义上可以理解为C中的枚举类型
# 单引号' 与quote是等价的，并且更简单一些。符号类型与字符串不同的是符号类型不能象字符串那样可以取得长度或改变其中某一成员字符的值，但二者之间可以互相转换
(define a (quote xyz))
(define xyz 'a)

# 复合数据类型是由基本的简单数据类型通过某种方式加以组合形成的数据类型，特点是可以容纳多种或多个单一的简单数据类型的数据，多数是基于某一种数学模型创建的。
## string
(define name "tomson")
(string-length name)
(string-set! name 0 #\g)  ; 更改字符串首字母(第0个字符)为小写字母g (#\g)
(string-ref name 3)  ; 取得字符串左侧第3个字符（从0开始）
(define other (string #\h #\e #\l #\l #\o ))

## pair 由一个点和被它分隔开的两个所值组成的
(define p (cons 4 5))
(car p)
(cdr p)
(set-car! p "hello")
(set-cdr! p "good")

## list:多个相同或不同的数据连续组成的数据类型
(define la (list 1 2 3 4 ))
(define y (make-list 5 6))  ;创建列表
(list-ref la 3)  ; 取得列表第3项的值（从0开始）
(list-set! la 2 99)  ; 设定列表第2项的值为99

(define a (cons 1 (cons 2 (cons 3 '()))))
(define ls (list 1 2 3 4))
# list是pair的子类型，list一定是一个pair，而pair不是list
(list? ls)
(pair? ls)

## vector 元素按整数来索引的对象
(define v (vector 1 2 3 4 5))
(vector-ref v 0)  ; 求第n个变量的值
(vector-length v)  ; 求vector的长度
(vector-set! v 2 "abc")  ; 设定vector第n个元素的值
(define x (make-vector 5 6))  ; 创建向量表

## 类型判断
(boolean? #f)
(char? #\;)
(integer? 8.9)
(rational? 2.3)
(real? 1.2)
(number? 2.345)
(null? '())     => #t  ; null意为空类型，它表示为 '() ，即括号里什么都没有的符

## 比较
# eq? 两个变量正好是同一个对象
# 两个对象具有相同的值
# equal? 两个对象具有相同的结构并且结构中的内容相同 用来判断点对，列表，向量表，字符串等复合结构数据类型
(eqv? 34 34)
(= 34 34)
(define v (vector 3 4 5))
(define w #(3 4 5))  ; w和v都是vector类型，具有相同的值#(3 4 5)
(eq? v w)
(equal? v w)

## 算术
(- 4)  => -4
(/ 4)  => 1/4
(max 8 89 90 213)  => 213
(min 3 4 5 6 7)  => 3
(abs -7) ==> 7

## 转换
(number->string 123)
(char->integer #\a)
(string->list "hello")
(string->symbol "good")

## 过程（Procedure） 输入加号然后回车 define不仅可以定义变量，还可以定义过程
## Lambda
(define add5 (lambda (x) (+ x 5)))
(add5 11) => 16

(define (add6 x) (+ x 6))
(add6 23)

(define fun
    (lambda(proc x y)
            (proc x y)))
(fun add 100 200)

(define isp
            (lambda (x)
                     (if (procedure? x) 'isaprocedure 'notaprocedure)))
isp
(isp 0)
 (isp +)

# 过程嵌套
(define fix
    (lambda (x y z)
        (define add
            (lambda (a b) (+ a b)))
        (- x (add y z))))
(display (fix 100 20 30))

# 顺序结构
(begin
    (display "Hello world!")  ; 输出"Hello world!"
    (newline))              ; 换行

# if结构
(if (= x 0)
(display "is zero")
(display "not zero"))

(if (< x 100) (display "lower than 100"))

(define fun
    (lambda ( x )
        (if (string? x)
            (display "is a string")
            (display "not a string"))))

# cond结构
(define w (lambda (x)
      (cond ((< x 0) 'lower)
           ((> x 0) 'upper)
           (else 'equal))))
w
(w 9)
(w -8)
(w 0)

# case结构
(case (* 2 3)
 ((2 3 5 7) 'prime)
 ((1 4 6 8 9) 'composite))

(define func
            (lambda (x y)
                    (case (* x y)
                            ((0) 'zero)
                            (else 'nozero)))
(func 2 3)

## and结构:如果表达式的值都不是boolean型的话，返回最后一个表达式的值
(and (boolean? #f) (< 8 12))
(and (list 1 2 3) (vector 'a 'b 'c))
(and 'e 'd 'c 'b 'a)

## or结构:只要其中有一个参数的表达式值为#t，其结果就为#t
(or (real? 4+5i) (integer? 3.22))

## 递归调用
(define  factoral (lambda (x)
    (if (<= x 1) 1
        (* x (factoral (- x 1))))))
(factoral 4)

(define (factoral n)
    (define (iter product counter)
        (if (> counter n)
            product
            (iter (* counter product) (+ counter 1))))
    (iter 1 1))
(display (factoral 4))

## 循环
define loop
    (lambda(x y)
        (if (<= x y)
        (begin (display x) (display #\\space) (set! x (+ x 1))
            (loop x y)))))
(loop 1 10)

## 变量和过程的绑定
## 局部变量：在过程内有效，过程外则无效
(let ((x 2) (y 5)) (* x y))

(let* ((x 6)(z (+ x y))) # 66

# letrec是将内部定义的过程或变量间进行相互引用的，
(letrec ((even?
        (lambda(x)
        (if (= x 0) #t
                (odd? (- x 1)))))
    (odd?
        (lambda(x)
        (if (= x 0) #f
                (even? (- x 1))))))
(even? 88))
# letrec帮助局部过程实现递归的操作，这不仅在letrec绑定的过程内，而且还包括所有初始化的东西，这使得在编写较复杂的过程中经常用到letrec，也成了理解它的一个难点
(letrec ((countdown
    (lambda (i)
    (if (= i 0) 'listoff
            (begin (display i) (display ",")
                    (countdown (- i 1)))))))
(countdown 10))

## apply 为数据赋予某一操作过程，第一个参数必需是一个过程，随后的其它参数必需是列表
(apply + (list 2 3 4))
(define sum
    (lambda (x )
            (apply + x)))  ; 定义求和过程
(define ls (list 2 3 4 5 6))
(sum ls)
(define avg
        (lambda(x)
                (/ (sum x) (length x))))   ; 定义求平均过程
(avg ls)

## map 第一个参数也必需是一个过程，随后的参数必需是多个列表，返回的结果是此过程来操作列表后的值
(map + (list 1 2 3) (list 4 5 6))

## 输入输出
(define port (open-input-file "readme"))
(read) ; 执行后即等待键盘输入
(define x (read)) ;等待键盘输入并赋值给x

(open-output-file "temp"))  ; 打开文件端口赋于port1
(write "hello\\nworld" port1)
(close-output-port port1)
(exit)