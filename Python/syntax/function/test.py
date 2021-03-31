// 用while实现 100 元 兑换 10元 5元 1元
total = 100
left = total
count = 0

i = 0
while left > 0:
    left = total - i * 10

    j = 0
    c = left
    while c > 0:
        c = left - j * 5

        k = 0
        d = c
        while d > 0:
          d = c - k * 1
          if k == 0:
              print('10元：',i, '5元：', j,'1元', k)
              count = count+1
          k += 1
        j += 1
    i += 1
print(count)
