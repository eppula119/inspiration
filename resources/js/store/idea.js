// import { OK, CREATED, UNPROCESSABLE_ENTITY } from '../util'

const state = {
  ideas: [],
  filterQuery: {
    category: "",
    price: "",
    created_at: ""
  }, // 検索パラメータ
  searchFlg: false
}

const getters = {
  // カテゴリー検索後のアイディア全て
  filteredIdeas(state) {
    let data = state.ideas;
    let query = state.filterQuery;

    if (!query.category && !query.price && !query.created_at) {
      console.log("アイディアすべて返す")
      return data;
    }
    if (query.category) {
      // カテゴリー検索
      data = data.filter(function (idea) {
        console.log("カテゴリー絞り込み済みアイディア")
        // 絞り込み中のカテゴリー名と合致したアイディアのみ配列に入れ直す。
        return idea.category.name.indexOf(query.category) !== -1;
      });
      // return data;
    }
    if (query.created_at || query.price) {
      console.log(query.created_at)
      if (query.price === "high") {
        console.log("高い順絞り込み")
        data.sort(function (a, b) {
          if (a.price < b.price) return 1;
          if (a.price > b.price) return -1;
          return 0;
        });
      }
      if (query.price === "low") {
        console.log("低い順絞り込み")
        data.sort(function (a, b) {
          if (a.price < b.price) return -1;
          if (a.price > b.price) return 1;
          return 0;
        });
      }
      if (query.created_at === "new") {  // ここから書くところから
        console.log("新しい順絞り込み")
        data.sort(function (a, b) {
          if (a.created_at < b.created_at) return 1;
          if (a.created_at > b.created_at) return -1;
          return 0;
        });
      }
      if (query.created_at === "old") {  // ここから書くところから
        console.log("古い順絞り込み")
        data.sort(function (a, b) {
          if (a.created_at < b.created_at) return -1;
          if (a.created_at > b.created_at) return 1;
          return 0;
        });
      }
      return data;
    }


    return data;
  },
}

const mutations = {
  // ステートの
  setFilterQuery(state, filterQuery) {
    state.filterQuery = filterQuery;
  },

  setIdeas(state, ideas) {
    state.ideas = ideas;
    console.log(state.ideas);
  }

}

const actions = {
  // カテゴリー名絞り込みメソッド呼び出し
  async setFilterQuery(context, filterQuery) {
    context.commit('setFilterQuery', filterQuery)
  },
  // stateのアイディア情報を更新
  async setIdeas(context, ideas) {
    context.commit('setIdeas', ideas)
  }

}

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
}