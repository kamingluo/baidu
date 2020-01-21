<template>
  <div>
    <div class="crumbs">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item
          ><i class="el-icon-lx-favor"></i> 昨日数据</el-breadcrumb-item
        >
      </el-breadcrumb>
    </div>
    <div class="container">
      <div class="plugins-tips">
        昨日点击广告数据。 banner广告(横幅)：<a
          href="https://github.com/lin-xin/vue-schart"
          target="_blank"
          >{{ pagesData.banner }} 次</a
        >
        ,feed广告(信息流)：<a
          href="https://github.com/lin-xin/vue-schart"
          target="_blank"
          >{{ pagesData.feed }} 次</a
        >
      </div>

      <div class="schart-box">
        <div class="content-title">banner(横幅广告)</div>
        <schart
          class="schart"
          canvasId="banner"
          :data="pagesData.bannerdata"
          type="bar"
          :options="options"
        ></schart>
      </div>

      <div class="schart-box">
        <div class="content-title">feed(信息流广告)</div>
        <schart
          class="schart"
          canvasId="feed"
          :data="pagesData.feeddata"
          type="bar"
          :options="options"
        ></schart>
      </div>
    </div>
  </div>
</template>

<script>
import Schart from "vue-schart";
export default {
  name: "basecharts",
  components: {
    Schart
  },
  data() {
    return {
      pagesData: "",
      options: {
        autoWidth: true, // 设置宽高自适应
        showValue: false,
        bgColor: "#F9EFCC",
        fillColor: "#00887C",
        contentColor: "rgba(46,199,201,0.3)",
        yEqual: 7
      }
    };
  },
  created() {
    this.getData();
  },

  methods: {
    //获取数据
    getData() {
      console.log("lalalala");
      let ascription = 6;
      this.url =
        "/miniapp.php/statistics/baiduad/todayclick?querytime=yesterday&ascription=" + ascription ;
      this.$axios(this.url).then(res => {
        let data = res.data.data;
        for (let i = 0; i < data.bannerdata.length; i++) {
          data.bannerdata[i].name =
            data.bannerdata[i].name + "(" + data.bannerdata[i].value + ")";
        }
        for (let v = 0; v < data.feeddata.length; v++) {
          data.feeddata[v].name =
            data.feeddata[v].name + "(" + data.feeddata[v].value + ")";
        }
        this.pagesData = data;
      });
    }
  }
};
</script>

<style scoped>
.schart-box {
  display: inline-block;
  margin: 30px;
}
.schart {
  width: 1450px;
  height: 300px;
}
.content-title {
  clear: both;
  font-weight: 400;
  line-height: 50px;
  margin: 10px 0;
  font-size: 22px;
  color: #1f2f3d;
}
</style>
