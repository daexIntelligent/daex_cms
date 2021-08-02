<template>
  <div class="UserList">
    <div class="title">
        <span class="titleContent">用戶列表</span>
        <a><p @click="handleCreate">新增用戶</p></a>
    </div>
      <div class="tableContainer">
        <table
          v-loading="listLoading"
          element-loading-text="Loading"
        >
          <tr>
            <th>#</th>
            <th>姓名</th>
            <th>E-mail</th>
            <th>角色</th>
            <th>狀態</th>
            <th>權限</th>
          </tr>
          <tr v-for="(item, key) in list" :key="key">
            <td>{{ item.user_id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.email }}</td>
            <td>{{ roleMap(item.role) }}</td>
            <td>{{ statusMap(item.status) }}</td>
            <td>
              <div class="switch">
                <input type="checkbox" id="switch"/>
                <label class="switch__label" for="switch"></label>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <el-dialog title="邀請新用戶" :visible.sync="dialogFormVisible">
      <el-table :data="tableData" style="width: 100%">
        <el-table-column prop="name" label="姓名">
          <template slot-scope="scope">
            <el-input size="small"
              style="text-align:center"
              v-model="scope.row.name" controls-position="right"></el-input>
          </template>
        </el-table-column>
        <el-table-column prop="email" label="Email">
          <template slot-scope="scope">
            <el-input size="small"
              style="text-align:center"
              v-model="scope.row.email" controls-position="right"></el-input>
          </template>
        </el-table-column>
        <el-table-column prop="role" label="角色">
          <template>
            <el-select v-model="value" value-key="value" placeholder="角色">
              <el-option v-for="item in role" :key="item.value" :label="item.label" :value="item"> {{ item.label }} </el-option>
            </el-select>
          </template>
        </el-table-column>
      </el-table>
      <a><p class="add" v-if="showAdd" @click="addRow">增加邀請名單</p></a>
      <div slot="footer" class="dialog-footer" align="center">
        <el-button type="primary" @click="inviteUser()">
          發送密碼設定通知信
        </el-button>
      </div>
    </el-dialog>
  </div>
</template>

<script>
import { getUserList, createUsers } from '@/api/user';

export default {
  filters: {
    statusFilter(status) {
      const statusMap = {
        published: 'success',
        draft: 'gray',
        deleted: 'danger'
      };
      return statusMap[status];
    }
  },
  data() {
    return {
      list: null,
      listLoading: false,
      status: 0,
      dialogFormVisible: false,
      rules: {},
      user: {
        name: undefined,
        email: undefined,
        role_id: undefined,
      },
      roleConfig: [
        '管理員',
        '用戶'
      ],
      statusConfig: [
        '帳號已關閉',
        '重發Email驗證信',
        '帳號已開通'
      ],
      tableData: [{}],
      addCount: 0,
      showAdd: true,
      role: [{
          value: 0,
          label: '管理員',
        }, {
          value: 1,
          label: '用戶'
        }],
      value: null
    };
  },
  created() {
    this.fetchData();
    this.value = this.role[0];
  },
  methods: {
    fetchData() {
      this.listLoading = true;
      getUserList().then(response => {
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
      // this.$nextTick(() => {
      //   this.$refs['dataForm'].clearValidate();
      // });
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
    },
    roleMap(roleId) {
      return this.roleConfig[roleId];
    },
    statusMap(status) {
      return this.statusConfig[status];
    }
  }
};
</script>

<style scoped>
.title {
  margin-top: 70px;
  margin-bottom: 1%;
  width: 90%;
  margin-left: auto;
  margin-right: auto;
  display: flex;
  font-weight: 600;
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
  /* background-color: #fff; */
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
}
.UserList .tableContainer table tr {
  border-radius: 10px;
  border: 1px solid #000;
  box-shadow: 0px 4px 3px 0px rgba(232, 232, 232, 0.8);
}
.UserList .tableContainer table tr th, .UserList .tableContainer table tr td {
  padding: 15px 15px;
  text-align: left;
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
.add {
  text-decoration: none;
  margin-left: auto;
  font-size: 14px;
  display: flex;
  align-items: center;
  color: #2C8CE4;
}
</style>>