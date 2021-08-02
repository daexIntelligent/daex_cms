<template>
  <div class="AccountInformation">
      <div class="title"><span><router-link to="/customers">客戶管理</router-link></span><span>> </span><span>建立新客戶</span></div>
      <div class="newsBox">
        <h2>帳號資訊</h2>
        <div class="inputContent"><span>公司名稱</span><span>-</span><span>中文</span><span class="Important">（必填，送出後無法更改）</span>
          <input type="text"/>
        </div>
        <div class="inputContent"><span>公司名稱</span><span>-</span><span>英文</span><span class="Important">（必填，送出後無法更改）</span>
          <input type="text"/>
        </div>
        <div class="inputContent"><span>公司代碼</span><span class="Important">（必填，送出後無法更改）</span>
          <input type="text"/>
        </div>
        <div class="inputContent"><span>公司統編</span><span class="Important">（必填，送出後無法更改）</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="full"><span>產業別</span><span class="Important">（必填，送出後無法更改）</span>
          <select class="w3-select w3-border dropMenu" name="option">
            <option>請選擇產業</option>
            <option>航空業</option>
            <option>餐飲業</option>
            <option>紡織業</option>
          </select>
        </div>
      </div>
      <div class="newsBox">
        <h2>聯絡資訊</h2>
        <div class="inputContent" id="full"><span>公司地址(中文)</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="full"><span>公司地址(英文)</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="contactPerson"><span>聯絡人</span><span class="Important">（必填）</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="email"><span>E-mail</span><span class="Important">（必填，預設服務內管理員帳號）</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="phone"><span>行動電話</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="workPhone"><span>公司電話</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="Extension"><span>分機</span>
          <input type="text"/>
        </div>
        <div class="inputContent" id="full"><span>客戶文件雲端資料夾連結</span><span class="Important">（必填）</span>
          <input type="text"/>
        </div>
      </div>
      <div class="Program"><span>客戶管理</span><span>> </span><span>建立新客戶</span></div>
      <div class="ProgramContainer">
        <div class="ProgramBox">
          <div class="ProgramImg">
            <div class="imgBox"><img src="https://lh3.googleusercontent.com/wmrbNBlqpQSWIlYDbyBsOxKXkT1igQU6qpOXopjRN5iyTaiqLSP0UiFeW-TbbO6Wes71-oFBa2x7B-_NFNM" alt=""/></div>
          </div>
          <p>DaEX for Publisher</p>
          <div class="switch">
            <input type="checkbox" id="switch"/>
            <label class="switch__label" for="switch"></label>
          </div>
        </div>
      </div>
      <div class="button"><span>送出</span></div>
    </div>
</template>

<script>
import { getCustomerList } from '@/api/customer';

export default {
  data() {
    return {
      list: null,
      listLoading: false,
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.listLoading = true;
      getCustomerList().then(response => {
        this.list = response.data;
        this.listLoading = false;
      });
    },
    resetModal() {
      this.tableData = [{}];
      this.addCount = 0;
      this.showAdd = true;
    },
    handleCreate() {
      this.resetModal();
      this.dialogFormVisible = true;
    },
    addRow() {
      const newRow = {};
      this.tableData = [...this.tableData, newRow];
      ++this.addCount;
      if (this.addCount > 3) {
        this.showAdd = false;
      }
    },
    inviteUser() {
      createUsers(this.tableData).then(response => {
        this.dialogFormVisible = false;
        this.fetchData();
      });
    },
    isActive(status) {
      if (status < 3) {
        return true;
      }
      return false;
    }
  }
};
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Noto Sans TC", sans-serif;
}

.Program {
  margin-top: 30px;
  margin-bottom: 1%;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  font-weight: 600;
}
.Program span {
  margin-left: 5px;
  font-size: 14px;
}

.ProgramContainer {
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  height: auto;
}
.ProgramContainer .ProgramBox {
  padding: 5%;
  display: flex;
  color: #1F1F1F;
  position: relative;
  min-width: 250px;
  width: 360px;
  height: auto;
  box-shadow: 0px 0px 4px 0px #e8e8e8;
  align-items: center;
}
.ProgramContainer .ProgramBox .switch {
  margin-left: 25%;
}
.ProgramContainer .ProgramBox .switch input {
  display: none;
}
.ProgramContainer .ProgramBox .switch label {
  cursor: pointer;
  text-indent: -9999px;
  width: 54px;
  height: 24px;
  background: grey;
  display: block;
  border-radius: 100px;
  position: relative;
}
.ProgramContainer .ProgramBox .switch label::after {
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
.ProgramContainer .ProgramBox .switch input:checked + label {
  background: #32BF1B;
}
.ProgramContainer .ProgramBox .switch input:checked + label:after {
  left: calc(100% - 2px);
  transform: translateX(-100%);
}
.ProgramContainer .ProgramBox .switch .switch__label:active:after {
  width: 100px;
}
.ProgramContainer .ProgramBox .ProgramImg {
  width: 50px;
  height: 50px;
  position: relative;
  margin-right: 10px;
}
.ProgramContainer .ProgramBox .ProgramImg .imgBox {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
}
.ProgramContainer .ProgramBox .ProgramImg img {
  width: 100%;
  height: 100%;
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
.AccountInformation {
  width: calc(100% - 100px);
  height: 100%;
  background-color: #fff;
  float: right;
}
.AccountInformation .newsBox:nth-child(3) {
  height: auto;
  margin-top: 30px;
}
.AccountInformation .newsBox {
  color: #1F1F1F;
  position: relative;
  margin-left: auto;
  margin-right: auto;
  width: 90%;
  height: auto;
  box-shadow: 0px 0px 4px 0px #e8e8e8;
  padding: 5%;
}
.AccountInformation .newsBox h2 {
  font-size: 16px;
}
.AccountInformation .newsBox .inputContent:nth-child(even) {
  margin-left: 0;
}
.AccountInformation .newsBox #full {
  width: calc(100% - 17px);
  margin-left: auto;
}
.AccountInformation .newsBox #contactPerson {
  width: calc(20%);
}
.AccountInformation .newsBox #email {
  width: calc(80% - 37px);
}
.AccountInformation .newsBox #phone {
  display: block;
  margin-left: 0;
}
.AccountInformation .newsBox #workPhone {
  margin-left: 0;
  width: calc(40% - 20px);
}
.AccountInformation .newsBox #Extension {
  margin-left: 20px;
  width: 15%;
}
.AccountInformation .newsBox .inputContent {
  margin-left: 20px;
  margin-top: 20px;
  display: inline-block;
  font-size: 12px;
  width: calc(50% - 20px);
}
.AccountInformation .newsBox .inputContent select {
  color: #838181;
  margin-top: 5px;
  border-radius: 5px;
  padding: 5px;
  display: flex;
  align-items: center;
}
.AccountInformation .newsBox .inputContent .dropMenu {
  height: 30px;
}
.AccountInformation .newsBox .inputContent .Important {
  color: red;
}
.AccountInformation .newsBox .inputContent .error {
  margin-left: 0;
}
.AccountInformation .newsBox .inputContent span:nth-child(1) {
  margin-left: 0px;
}
.AccountInformation .newsBox .inputContent span {
  color: #838181;
  margin-left: 5px;
}
.AccountInformation .newsBox .inputContent input {
  height: 24px;
  margin-top: 5px;
  display: block;
  width: 100%;
  border-radius: 5px;
  border: 1px solid #C4C4C4;
  padding: 5px;
}

.button {
  width: 140px;
  height: 40px;
  display: flex;
  background-color: #3989D2;
  border-radius: 5px;
  margin: 30px auto;
  align-items: center;
  text-align: center;
}
.button span {
  margin-left: auto;
  margin-right: auto;
  padding: 40px;
  color: white;
  font-size: 14px;
}
</style>
