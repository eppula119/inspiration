<template>
  <div>
    <section id="ideas">
      <IdeaSort />
      <!--ーーーーーーーーーーーーーーーーーー アイデア複数表示 ーーーーーーーーーーーーーーーーーー-->
      <div class="p-ideas">
        <Idea class="p-idea" v-for="idea in filtered" :key="idea.id" :item="idea" />
      </div>
      <!--ーーーーーーーーーーーーーーーーーー ページネーション ーーーーーーーーーーーーーーーーーー-->
      <ul class="c-pagenation p-ideasPage">
        <Pagination :items="filteredIdeas"></Pagination>
      </ul>
    </section>
  </div>
</template>

<script>
import { OK } from "../util";
import Idea from "../components/idea.vue";
import IdeaSort from "../components/IdeaSort.vue";
import { mapState, mapGetters } from "vuex";
import Pagination from "../components/Pagination.vue";

export default {
  components: {
    Idea,
    IdeaSort,
    Pagination
  },
  props: {
    page: {
      type: Number,
      required: false,
      default: 1
    }
  },
  data() {
    return {
      length: 6
    };
  },
  methods: {
    // 全てのアイディアを取得
    async fetchIdeas() {
      const response = await axios.get("/api/buy");
      console.log("api読み込み");
      console.log(response.data.data);
      //　レスポンスエラーの場合エラーstateにstatusをセット
      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        console.log("エラー");
        return false;
      }
      // 通信成功時、ideaストアにアイディア全てセット
      this.$store.dispatch("idea/setIdeas", response.data);
    }
  },

  computed: {
    // ideaストアのideasを参照
    ...mapState({
      ideas: state => state.idea.ideas
    }),
    // ideaストアのfilteredIdeas(絞り込み後のアイディア)を参照
    ...mapGetters({
      filteredIdeas: "idea/filteredIdeas"
    }),
    // 表示したいデータの最初の値
    listStart() {
      return 6 * (this.$store.state.paging.paginationNUmber - 1);
    },
    //　表示したデータを取得。1〜6、7〜12、13〜18...の6ごとのデータを取得
    filtered() {
      let list = [];
      if (this.filteredIdeas) {
        list = this.filteredIdeas.concat();
      } else {
        list = this.ideas.concat();
      }

      if (this.length) {
        list = list.splice(this.listStart, this.length);
      }
      console.log("listの中身");
      console.log(list);
      return list;
    }
  },

  watch: {
    $route: {
      async handler(to, from) {
        console.log(from);
        console.log("$routeが変わった");
        await this.fetchIdeas(); // api通信開始メソッド実行
        console.log(to);
      },
      immediate: true // 起動時にも実行
    }
  }
};
</script>