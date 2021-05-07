const promiseToDoSomething = () => {
    return new Promise(resolve => {
        setTimeout(() => resolve('做些事情'), 10000)
    })
}

const watchOverSomeoneDoingSomething = async () => {
    const something = await promiseToDoSomething()
    return something + ' 查看'
}

const watchOverSomeoneWatchingSomeoneDoingSomething = async () => {
    const something = await watchOverSomeoneDoingSomething()
    return something + ' 再次查看'
}

watchOverSomeoneWatchingSomeoneDoingSomething().then(res => {
    console.log(res)
})
