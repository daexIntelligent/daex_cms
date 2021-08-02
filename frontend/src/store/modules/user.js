import {login, logout} from '@/api/user';
import {getCookie, setCookie, removeCookie} from '@/utils/auth';
import {resetRouter} from '@/router';

const state = {
  token: getCookie(),
  name: '',
  userId: '',
  avatar: ''
};

const mutations = {
  setToken: (state, token) => {
    state.token = token;
  },
  setUser: (state, user) => {
    state.name = user.name;
    state.userId = user.userId;
  }
};

const actions = {
  login({commit}, userInfo) {
    const {email, password} = userInfo;
    return new Promise((resolve, reject) => {
      login({email: email.trim(), password: password}).then(response => {
        const { token, ...remains } = response.data;
        commit('setToken', token);
        commit('setUser', remains);
        setCookie({token: token});
        resolve();
      }).catch(error => {
        console.log(error);
        reject(error);
      });
    });
  },

  logout({commit, state}) {
    return new Promise((resolve, reject) => {
      logout(state.token).then(() => {
        commit('setToken', '');
        commit('setUser', '');
        removeCookie();
        resetRouter();
        resolve();
      }).catch(error => {
        reject(error);
      });
    });
  },

  resetToken({commit}) {
    return new Promise(resolve => {
      const cookie = JSON.parse(getCookie());
      commit('setToken', cookie.token);
      commit('setUser', cookie.user);
      resolve();
    });
  }
};

export default {
  namespaced: true,
  state,
  mutations,
  actions
};
