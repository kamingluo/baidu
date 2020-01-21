<template>
  <div>
    <div class="crumbs">
      <el-breadcrumb separator="/">
        <el-breadcrumb-item
          ><i class="el-icon-lx-favor"></i> 今日数据</el-breadcrumb-item
        >
      </el-breadcrumb>
    </div>
    <div class="container">
      <div class="plugins-tips">
        今日点击广告数据。 banner广告(横幅)：<a
          href="https://github.com/lin-xin/vue-schart"
          target="_blank"
          >1445次</a
        >
        ,feed广告(信息流)：<a
          href="https://github.com/lin-xin/vue-schart"
          target="_blank"
          >1445次</a
        >
      </div>

      <div class="schart-box">
                <div class="content-title">banner(横幅广告)</div>
                <schart class="schart" canvasId="banner" :data="data1" type="bar" :options="options1"></schart>
            </div>

     <div class="schart-box">
                <div class="content-title">feed(信息流广告)</div>
                <schart class="schart" canvasId="feed" :data="data2" type="bar" :options="options2"></schart>
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
  data: () => ({
    data1: [
      { name: "2012", value: 1141 },
      { name: "2013", value: 1499 },
      { name: "2014", value: 2260 },
      { name: "2015", value: 1170 },
      { name: "2016", value: 970 },
      { name: "2017", value: 1450 }
    ],
    data2: [
      { name: "2012", value: 1141 },
      { name: "2013", value: 1499 },
      { name: "2014", value: 2260 },
      { name: "2015", value: 1170 },
      { name: "2016", value: 970 },
      { name: "2017", value: 1450 }
    ],
    options1: {
      title: "banner(横幅广告)",
      autoWidth: true, // 设置宽高自适应
      showValue: false,
      bgColor: "#F9EFCC",
      fillColor: "#00887C",
      contentColor: "rgba(46,199,201,0.3)",
      yEqual: 7
    },
    options2: {
      title: "feed(信息流广告)",
      autoWidth: true, // 设置宽高自适应
      showValue: false,
      bgColor: "#F9EFCC",
      fillColor: "#00887C",
      contentColor: "rgba(46,199,201,0.3)",
      yEqual: 7
    }
  })
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
