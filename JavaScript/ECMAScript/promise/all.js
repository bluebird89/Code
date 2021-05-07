const f1 = fetch('/something.json')
const f2 = fetch('/something2.json')

Promise.all([f1, f2])
    .then(res => {
        console.log('结果的数组', res)
    })
    .catch(err => {
        console.error(err)
    })
