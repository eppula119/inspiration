<template>
  <div class="c-modal" v-if="modalShow">
    <reviewModal />
    <buyModal />
  </div>
</template>

<script>
import { mapState } from "vuex";
import buyModal from "../components/buyModal.vue";
import reviewModal from "../components/reviewModal.vue";

export default {
  components: {
    reviewModal,
    buyModal
  },
  data() {
    return {};
  },
  computed: {
    ...mapState({
      modalShow: state => state.modal.modalFlg
    })
  },
  methods: {
    async modalClose() {
      this.$store.dispatch("modal/setmodalVal", false);
    }
  }
};
</script>