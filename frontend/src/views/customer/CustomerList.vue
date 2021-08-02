<template>
  <div class="UserList">
      <div class="title"><span>客戶管理</span><span>> </span><span>客戶列表</span><a href="#"> 
          <p>新增用戶</p></a></div>
      <div class="tableContainer">
        <table>
          <tr class="trstyle">
            <th>#</th>
            <th>公司名稱</th>
            <th>聯絡人</th>
            <th>E-mail</th>
            <th>狀態</th>
            <th>手機</th>
            <th>電話</th>
            <th>啟用服務</th>
          </tr>
          <tr>
            <td>1</td>
            <td> <a href="">關鍵評論網</a></td>
            <td>How</td>
            <td>sean.hsu@daexintel.com</td>
            <td> <a href="">重發 E-mail</a></td>
            <td> </td>
            <td>02-23456789#123</td>
            <td>Publisher</td>
          </tr>
          <tr>
            <td>1</td>
            <td> <a href="">INSIDE</a></td>
            <td>Street</td>
            <td>luna.chang@daexintel.com</td>
            <td> <a href="">帳號已開通</a></td>
            <td>0912-345678</td>
            <td> </td>
            <td> </td>
          </tr>
        </table>
      </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Noto Sans TC", sans-serif;
}

body, html {
  margin: 0;
  display: 0;
  width: 100%;
  height: 100%;
}

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
  display: none;
  border-radius: 10px;
  z-index: 1;
  width: 200px;
  height: 100px;
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

section {
  height: 100vh;
}
section .sideMenuContainer {
  float: left;
  display: inline-blcok;
  position: relative;
  width: 100px;
  height: 100%;
  background-color: #ECEDF0;
}
section .sideMenuContainer .sideMenu {
  width: 100%;
}
section .sideMenuContainer .sideMenu ul {
  width: 100%;
  height: auto;
}
section .sideMenuContainer .sideMenu ul .sideMenuButton {
  position: relative;
  width: 100%;
  height: 80px;
  cursor: pointer;
}
section .sideMenuContainer .sideMenu ul .sideMenuButton.sideClick {
  background-color: #F6F6F6;
}
section .sideMenuContainer .sideMenu ul .sideMenuButton img {
  padding-top: 15px;
  padding-bottom: 15px;
  position: absolute;
  width: 100%;
  height: 100%;
  margin-right: auto;
  margin-left: auto;
}

.title {
  margin-top: 70px;
  margin-bottom: 1%;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  font-weight: 600;
}
.title span {
  margin-left: 5px;
  font-size: 14px;
}
.title a {
  text-decoration: none;
  margin-left: auto;
  font-size: 14px;
  display: flex;
  align-items: center;
  color: #2C8CE4;
}

.UserList {
  width: calc(100% - 100px);
  height: 100%;
  background-color: #fff;
  float: right;
}
.UserList .tableContainer {
  margin: auto;
  margin-bottom: 5%;
  width: 90%;
  height: 90%;
  background-color: #fff;
}
.UserList .tableContainer table {
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  font-size: 14px;
  border-collapse: collapse;
  font-size: 14px;
}
.UserList .tableContainer table .trstyle {
  background-color: #F6F6F6;
}
.UserList .tableContainer table tr {
  border-radius: 15px;
  text-align: left;
}
.UserList .tableContainer table tr th, .UserList .tableContainer table tr td {
  padding: 15px 15px;
}
.UserList .tableContainer table tr th a, .UserList .tableContainer table tr td a {
  text-decoration: none;
  color: #2C8CE4;
}
.UserList .tableContainer table tr input {
  display: none;
}
.UserList .tableContainer table tr label {
  cursor: pointer;
  text-indent: -9999px;
  width: 54px;
  height: 24px;
  background: grey;
  display: block;
  border-radius: 100px;
  position: relative;
}
.UserList .tableContainer table tr label::after {
  content: "";
  position: absolute;
  top: 1px;
  left: 2px;
  width: 24px;
  height: 22px;
  background: #fff;
  border-radius: 90px;
  transition: 0.3s;
}
.UserList .tableContainer table tr input:checked + label {
  background: #32BF1B;
}
.UserList .tableContainer table tr input:checked + label:after {
  left: calc(100% - 2px);
  transform: translateX(-100%);
}
.UserList .tableContainer table tr .switch__label:active:after {
  width: 100px;
}
</style>