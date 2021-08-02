<template>
  <!-- <div :class="{'has-logo':showLogo}">
    <logo v-if="showLogo" :collapse="isCollapse" />
    <el-scrollbar wrap-class="scrollbar-wrapper">
      <el-menu
        :default-active="activeMenu"
        :collapse="isCollapse"
        :background-color="variables.menuBg"
        :text-color="variables.menuText"
        :unique-opened="false"
        :active-text-color="variables.menuActiveText"
        :collapse-transition="false"
        mode="vertical"
      >
        <sidebar-item v-for="route in routes" :key="route.path" :item="route" :base-path="route.path" />
      </el-menu>
    </el-scrollbar>
  </div> -->
  <div class="sideMenuContainer">
    <nav class="sideMenu">
      <div class="ul">
        <div class="sideMenuButton">
          <router-link to="/users">
            <img src="../../assets/images/YDj.svg" />
          </router-link>
        </div>
        <div class="sideMenuButton">
          <router-link to="/customers">
            <img src="../../assets/images/YEB.svg" alt="" />
          </router-link>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'Sidebar'
}
</script>

<style>
.sideMenuContainer {
  float: left;
  display: inline-blcok;
  position: relative;
  width: 100px;
  height: 100%;
  background-color: #ECEDF0;
}
.sideMenuContainer .sideMenu {
  width: 100%;
}
.sideMenuContainer .sideMenu .ul {
  width: 100%;
  height: auto;
}
.sideMenuContainer .sideMenu .ul .sideMenuButton {
  position: relative;
  width: 100%;
  height: 80px;
  cursor: pointer;
}
.sideMenuContainer .sideMenu .ul .sideMenuButton.sideClick {
  background-color: #F6F6F6;
}
.sideMenuContainer .sideMenu .ul .sideMenuButton img {
  padding-top: 15px;
  padding-bottom: 15px;
  position: absolute;
  width: 100%;
  height: 100%;
  margin-right: auto;
  margin-left: auto;
}
</style>