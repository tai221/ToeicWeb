import request from '../utils/request'

export function getTest(id) {
    return request({
        url: `api/test/get/${id}`,
        method: 'get'
    })
}

export function createTest(data) {
    return request({
        url: 'api/test/create',
        method: 'post',
        data
    })
}

export function updateTest(id, data) {
    return request({
        url: `api/test/update/${id}`,
        method: 'post',
        data
    })
}

export function getAllTest() {
    return request({
        url: 'api/test/getall',
        method: 'get'
    })
}

export function deleteTest(data) {
    return request({
        url: `api/test/delete`,
        method: 'post',
        data
    })
}
