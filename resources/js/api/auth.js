import request from '../utils/request'

export function logout() {
    return request({
        url: '/api/logout',
        method: 'post'
    })
}

export function login(data) {
    return request({
        url: '/api/login',
        method: 'post',
        data
    })
}
