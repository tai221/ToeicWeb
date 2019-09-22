import request from '../utils/request'

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
        url: '/api/v1/account/'+id,
        method: 'patch',
        data
    })
}

export function getAllAccount() {
    return request({
        url: '/api/v1/account/',
        method: 'get'
    })
}

export function deleteAccount(id) {
    return request({
        url: '/api/v1/account/'+id,
        method: 'delete',
    })
}

export function banAccount(id) {
    return request({
        url: '/api/v1/account/'+ id+'/edit',
        method: 'get'
    })
}

export function unbanAccount(id) {
    return request({
        url: '/api/v1/account/'+ id+'/edit',
        method: 'get'
    })
}

export function searchAccount(data) {
    return request({
        url: '/api/v1/search/account',
        method: 'post',
        data
    })
}
