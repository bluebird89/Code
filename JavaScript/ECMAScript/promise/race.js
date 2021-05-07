const first = new Promise((resolve, reject) => {
    setTimeout(resolve, 500, '第一个')
})
const second = new Promise((resolve, reject) => {
    setTimeout(resolve, 100, '第二个')
})

Promise.race([first, second]).then(result => {
    console.log(result) // 第二个
})
