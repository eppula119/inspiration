

const state = {
  ideaId: null,
  modalFlg: false,  // モーダル表示・非表示
  reviewMoldalFlg: false,  // レビューモーダル表示・非表示
  buyMoldalFlg: false,  // 購入画面モーダル表示・非表示
  sell: {
    sellerEmail: null
  }
}

const mutations = {
  setideaId(state, id) {
    state.ideaId = id;  // stateのideaIdを更新
  },
  setmodalVal(state, modalVal) {
    state.modalFlg = modalVal;  // stateのmodalFlgを更新
  },
  setreviewModal(state, reviewModal) {
    state.reviewMoldalFlg = reviewModal;  // stateのreviewMoldalFlgを更新
  },
  setbuyModal(state, buyModal) {
    state.buyModalFlg = buyModal;  // stateのbuyMoldalFlgを更新
  },
  setsellerEmail(state, sellerEmail) {
    state.sell.sellerEmail = sellerEmail;
  }
}

const actions = {
  async setideaId(context, id) {      // アイディアidを更新
    context.commit('setideaId', id)
  },
  async setmodalVal(context, modalVal) {      // モーダルFlgを更新
    context.commit('setmodalVal', modalVal)
  },
  async setreviewModal(context, reviewModal) {      // レビューモーダルFlgを更新
    context.commit('setreviewModal', reviewModal)
  },
  async setbuyModal(context, buyModal) {      // 購入画面モーダルFlgを更新
    context.commit('setbuyModal', buyModal)
  },
  async setsellerEmail(context, sellerEmail) {      // 売り手メールアドレスを更新
    context.commit('setsellerEmail', sellerEmail)
  }
}


export default {
  namespaced: true,
  state,
  mutations,
  actions
}