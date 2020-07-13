<template>
  <div>
    <div class="p-category">
      <ul class="p-category__items">
        <li class="p-categoryItem">カテゴリー</li>
        <label v-for=" (category, i) in this.categorys" :key="i">
          <input
            type="radio"
            class="p-categoryItem"
            :value="category.name"
            v-model="filterQuery.category"
            @change="handleChangeQuery"
          />
          {{ category.name }}
        </label>
      </ul>
    </div>

    <div class="p-refine">
      <form method="post" action="#" class="p-refineForm">
        <select
          name="価格"
          class="p-refineForm__select"
          v-model="filterQuery.price"
          @change="handleChangeQuery"
        >
          <option value="high" class="p-selectItem">価格の高い順</option>
          <option value="low" class="p-selectItem">価格の安い順</option>
        </select>
        <select
          name="投稿日"
          class="p-refineForm__select"
          v-model="filterQuery.created_at"
          @change="handleChangeQuery"
        >
          <option value="new" class="p-selectItem">新しい順</option>
          <option value="old" class="p-selectItem">古い順</option>
        </select>
        <input type="submit" class="p-searchBtn" placeholder="検索" />
      </form>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data: function() {
    return {
      categorys: {},
      // 絞り込み中のカテゴリー
      filterQuery: {
        category: "",
        price: "",
        created_at: ""
      }
    };
  },
  created: function() {
    var self = this;
    var url = "/api/category/search";
    axios.post(url).then(function(response) {
      // カテゴリーモデルからデータを全て取得
      self.categorys = response.data["category"];
    });
  },

  mounted() {
    // ideaストアの絞り込みメソッドを呼び出す
    this.$store.dispatch("idea/setFilterQuery", this.filterQuery);
  },

  computed: {
    // 絞り込み後のアイディア全て参照
    ...mapGetters({
      filteredIdeas: "idea/filteredIdeas"
    })
  },

  methods: {
    // ideaストアの絞り込みメソッドを呼び出す
    handleChangeQuery() {
      console.log("フィルタークエリ発動");
      this.$store.dispatch("idea/setFilterQuery", this.filterQuery);
    }
  },
  watch: {
    // 絞り込み後、現在ページを１ページ目に戻す
    "filterQuery.category": function() {
      this.$store.dispatch("paging/setPageNum", 1);
    },
    "filterQuery.price": function() {
      this.$store.dispatch("paging/setPageNum", 1);
    },
    "filterQuery.created_at": function() {
      this.$store.dispatch("paging/setPageNum", 1);
    }
  }
};
</script>