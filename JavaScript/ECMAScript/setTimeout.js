setTimeout(() => {
    console.log('success')
}, 2000)

const myFunc = (first, second) => {
    console.log(first + " " + second)
}

const id = setTimeout(myFunc, 3000, 'hello', 'wolrd');
clearTimeout(id)

// 异步：通过在调度程序中排队函数，可以避免在执行繁重的任务时阻塞 CPU，并在执行繁重的计算时执行其他函数
setTimeout(() => {
    console.log('后者 ')
}, 0)

console.log(' 前者 ')

let i = 0;
const interval = setInterval(() => {
    i++;
    if (i == 10) {
        clearInterval(interval)
        console.log('清除定时')
        return
    }
    console.log('Time:' + i);
}, 100)


// 递归 setTimeout,死循环了
let j = 0;
const myFunction = () => {
    j++;
    const id = setTimeout(myFunction, 1000)
    if (j == 5) {
        clearTimeout(id);
    }
    console.log('Time:' + i);
}

setTimeout(myFunction, 1000)
