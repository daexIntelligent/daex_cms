import request from '@/utils/request';

export function login(data) {
  return request({
    url: '/users/login',
    method: 'post',
    data
  });
}

export function logout() {
  return request({
    url: '/users/logout',
    method: 'post'
  });
}

export function getUserList() {
  return request({
    url: '/users',
    method: 'get',
  });
}

export function createUsers(data) {
  return request({
    url: '/users',
    method: 'post',
    data
  });
}

export function getInfo(token) {
  return request({
    url: '/user/info',
    method: 'get',
    params: { token }
  });
}
