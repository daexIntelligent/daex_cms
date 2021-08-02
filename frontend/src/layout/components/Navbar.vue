<template>
    <header class="HeaderContent">
    <div class="logoContainer">
      <div class="logoContent"><a href="#"> <img src="https://i.imgur.com/vecplup.png" alt=""/></a></div>
      <div class="cmsContent"><img src="https://i.imgur.com/HMeUakS.png" alt=""/></div>
    </div>
    <div class="userContainer">
      <div class="userAvatarContainer">
        <div class="userAvatarContent"><img src="https://i.imgur.com/APwdubR.jpg" alt=""/></div>
      </div>
      <div class="userNameContainer">
        <p>Sean</p>
      </div>
      <div class="menu" @click="toggle"><img src="https://svgur.com/i/YC5.svg" alt=""/></div>
      <div v-show="isShow" class="pull-down-menu">
        <nav>
          <ul>
            <li> <img class="logoImg" src="https://svgur.com/i/YEw.svg" alt=""/><span>修改密碼</span></li>
            <li @click="logout()"> <img class="logoImg" src="https://svgur.com/i/YDm.svg" alt=""/><span>登出</span></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: 'Navbar',
  data() {
    return {
      isShow: false
    };
  },
  methods: {
    toggle() {
      this.isShow = !this.isShow;
    },
    logout() {
      this.loading = true;
      this.$store.dispatch('user/logout').then(() => {
        this.$router.push({ path: '/login' });
          this.loading = false;
        }).catch(() => {
          this.loading = false;
        });
     }
   }
};
</script>

<style>
  .HeaderContent {
    width: 100%;
    background-color: #3989D2;
    height: 58px;
    display: flex;
  }

  .HeaderContent .logoContainer {
    margin-left: 10px;
    position: relative;
    float: left;
  }

  .HeaderContent .logoContainer .logoContent {
    margin-top: 8px;
    width: 40px;
    height: 40px;
    display: inline-block;
    cursor: pointer;
  }

  .HeaderContent .logoContainer .logoContent img {
    width: 100%;
    height: 100%;
  }
  .HeaderContent .logoContainer .cmsContent {
    margin-left: 15%;
    top: 14px;
    position: absolute;
    width: 75px;
    height: 50%;
    display: inline-block;
    cursor: pointer;
  }
  .HeaderContent .logoContainer .cmsContent img {
    width: 100%;
    height: 100%;
  }
  .HeaderContent .userContainer {
    display: flex;
    margin-left: auto;
    max-width: 300px;
    float: left;
    margin-right: 10px;
  }
  .HeaderContent .userContainer .pull-down-menu {
    /* display: none;*/ 
    border-radius: 10px;
    z-index: 1;
    width: 200px;
    /* height: 100px; */
    background-color: #fff;
    position: absolute;
    top: 10%;
    right: 10px;
    box-shadow: -2px 4px 5px 0px rgba(232, 232, 232, 0.8);
  }
  .HeaderContent .userContainer .pull-down-menu ul {
    width: 100%;
    height: auto;
  }
  .HeaderContent .userContainer .pull-down-menu ul li {
    cursor: pointer;
    padding: 10px;
    height: 50px;
    list-style: none;
    display: flex;
    align-items: center;
  }
  .HeaderContent .userContainer .pull-down-menu ul li img {
    fill: #999;
    height: 100%;
  }
  .HeaderContent .userContainer .pull-down-menu ul li span {
    margin-left: 10px;
    font-size: 14px;
  }
  .HeaderContent .userContainer .menu {
    margin-left: 10px;
    margin-top: 8px;
    width: 40px;
    height: 40px;
    cursor: pointer;
  }
  .HeaderContent .userContainer .menu img {
    width: 100%;
    height: 100%;
  }
  .HeaderContent .userContainer .userNameContainer {
    margin-left: 10px;
    color: #fff;
    display: flex;
    align-items: center;
  }
  .HeaderContent .userContainer .userAvatarContainer {
    margin-top: 8px;
    position: relative;
    width: 40px;
    display: block;
    height: 40px;
  }
  .HeaderContent .userContainer .userAvatarContainer .userAvatarContent {
    width: 100%;
    height: 100%;
  }
  .HeaderContent .userContainer .userAvatarContainer .userAvatarContent img {
    border-radius: 100%;
    width: 100%;
    height: 100%;
  }
</style>
