import router from '@/router';
import {getCookie} from '@/utils/auth';
import getPageTitle from '@/utils/get-page-title';

const whiteList = ['/login'];

router.beforeEach(async(to, from, next) => {
  document.title = getPageTitle(to.meta.title);

  const hasToken = getCookie();
  if (hasToken) {
    if (to.path === '/login') {
      next({path: '/'});
    } else {
      next();
    }
  } else {
    if (whiteList.indexOf(to.path) !== -1) {
      next();
    } else {
      next(`/login?redirect=${to.path}`);
    }
  }
});