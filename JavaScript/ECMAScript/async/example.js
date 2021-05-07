const doSomethingAsync = () => {
    return new Promise(resolve => {
        setTimeout(() => resolve('做些事情'), 3000)
    })
}

const doSomething = async () => {
    console.log(await doSomethingAsync())
}

console.log('之前')
doSomething()
console.log('之后')
