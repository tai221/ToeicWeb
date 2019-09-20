import request from './request'

export function getAccount(id) {
    return request({
        url: '/api/v1/account/'+id,
        method: 'get'
    })
}

export function createAccount(data) {
    return request({
        url: '/api/v1/account/',
        method: 'post',
        data
    })
}

export function updateAccount(id, data) {
    return request({
        url: '/api/v1/account/',
        method: 'patch',
        id,
        data
    })
}
