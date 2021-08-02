import request from '@/utils/request';

export function getCustomerList() {
  return request({
    url: '/customers',
    method: 'get',
  })
}
