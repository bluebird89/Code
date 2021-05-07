const status = response => {
    if (response.status >= 200 && response.status <= 300) {
        return Promise.resolve(response)
    }
    return Promise.reject(new Error(response.statusText))
}

const json = response => response.json()

fetch('/todos.json').then(status).then(json).then(data => {
    console.log('请求成功', data)
}).catch(error => {
    console.log('请求失败', error)
})
