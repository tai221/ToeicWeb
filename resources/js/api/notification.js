import request from '../utils/request'

export function getNoti() {
    return request({
        url: '/api/notification/getNoti',
        method: 'get'
    })
}
export function markAsRead() {
    return request({
        url: '/api/notification/markAsRead',
        method: 'post'
    })
}
