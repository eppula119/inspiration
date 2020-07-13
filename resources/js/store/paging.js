

const state = {
  paginationNUmber: 1  // 現在のページ
}

const mutations = {
  setPageNum(state, pageNum) {
    state.paginationNUmber = pageNum;  // stateの現在ページを更新
  }
}

const actions = {
  async setPageNum(context, pageNum) {      // ページ情報を更新
    context.commit('setPageNum', pageNum)
  }
}


export default {
  namespaced: true,
  state,
  mutations,
  actions
}