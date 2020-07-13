<template>
  <paginate
    v-model="page"
    :page-count="paginationNumber"
    :page-range="3"
    :margin-pages="0"
    :prev-text="null"
    :next-text="null"
    :container-class="'pagination'"
    :page-class="'page-item'"
  >></paginate>
</template>

<script>
import Vue from "vue";
import Paginate from "vuejs-paginate";
import { mapState } from "vuex";

Vue.component("paginate", Paginate);

export default {
  props: {
    items: {
      required: false,
      default: []
    }
  },
  data() {
    return {
      length: 6 // 1ページに表示するアイディアの数
    };
  },
  methods: {
    // clickCallback(pageNum) {
    //   // this.page = pageNum; // pageNumはpagerの何番目をclickしたかを取得
    //   // this.$store.state.paginationNUmber = pageNum; // 何番目をclickしたかをstoreの値にset
    //   this.$store.dispatch("paging/setPageNum", pageNum);
    // }
  },
  computed: {
    // 全ページ数
    paginationNumber() {
      return this.items.length / 6;
    },
    page: {
      get() {
        return this.$store.state.paging.paginationNUmber; // pageストアの現在のページ番号取得
      },
      set(pageNum) {
        this.$store.dispatch("paging/setPageNum", pageNum); // pageストアに移動先のページ番号をセット
      }
    }
  }
};
</script>