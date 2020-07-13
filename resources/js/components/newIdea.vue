<template>
  <div>
    <!--ーーーーーーーーーーーーーーーーーー アイディア投稿画面表示 ーーーーーーーーーーーーーーーーーー-->
    <p class="p-heading">アイディア投稿</p>
    <form class="p-newIdea p-postWidth" @submit.prevent="submit">
      <span class="p-newIdea__errors" role="alert" v-if="errors">
        <ul v-if="errors.photo">
          <li v-for="msg in errors.photo" :key="msg">{{ msg }}</li>
        </ul>
      </span>
      <input type="text" name="name" class="p-newIdea__title" v-model="name" placeholder="アイディア名" />

      <select name="category_id" class="p-newIdea__category" v-model="category_id">
        <option value="1" class="p-selectCategory">マッチング</option>
        <option value="2" class="p-selectCategory">掲示板</option>
        <option value="3" class="p-selectCategory">SNS</option>
        <option value="4" class="p-selectCategory">シェアリング</option>
        <option value="5" class="p-selectCategory">ECサイト</option>
        <option value="6" class="p-selectCategory">情報発信</option>
        <option value="7" class="p-selectCategory">その他</option>
      </select>

      <div class="p-fileContainer">
        <label class="p-fileContainer__airDrop">
          ドラッグ＆ドロップ
          <input type="file" class="p-dropImg" name="photo1" @change="onFileChange" />
          <output class="p-outputImg" v-if="preview[0]">
            <img class="p-outputImg__img" :src="preview[0]" alt />
          </output>
        </label>
        <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
      </div>

      <div class="p-fileWrap">
        <div class="p-fileContainerSub">
          <label class="p-fileContainerSub__airDrop">
            ドラッグ＆ドロップ
            <input type="file" class="p-dropImg" name="photo2" @change="onFileChange" />
            <output class="p-outputImg" v-if="preview[1]">
              <img class="p-outputImg__img" :src="preview[1]" alt />
            </output>
          </label>
          <div class="p-fileContainerSub__msg">画像の容量は10MB以内に抑えてください。</div>
        </div>
        <div class="p-fileContainerSub">
          <label class="p-fileContainerSub__airDrop">
            ドラッグ＆ドロップ
            <input type="file" class="p-dropImg" name="photo3" @change="onFileChange" />
            <output class="p-outputImg" v-if="preview[2]">
              <img class="p-outputImg__img" :src="preview[2]" alt />
            </output>
          </label>
          <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
        </div>
        <div class="p-fileContainerSub">
          <label class="p-fileContainerSub__airDrop">
            ドラッグ＆ドロップ
            <input type="file" class="p-dropImg" name="photo4" @change="onFileChange" />
            <output class="p-outputImg" v-if="preview[3]">
              <img class="p-outputImg__img" :src="preview[3]" alt />
            </output>
          </label>
          <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
        </div>
        <div class="p-fileContainerSub">
          <label class="p-fileContainerSub__airDrop">
            ドラッグ＆ドロップ
            <input type="file" class="p-dropImg" name="photo5" @change="onFileChange" />
            <output class="p-outputImg" v-if="preview[4]">
              <img class="p-outputImg__img" :src="preview[4]" alt />
            </output>
          </label>
          <div class="p-fileContainer__msg">画像の容量は10MB以内に抑えてください。</div>
        </div>
      </div>

      <textarea
        class="p-newIdea__outLine"
        name="outline"
        cols="30"
        rows="10"
        v-model="outline"
        placeholder="概要"
      ></textarea>
      <span class="p-newIdea__count">1/200</span>
      <textarea
        class="p-newIdea__content"
        name="content"
        cols="30"
        rows="10"
        placeholder="内容"
        v-model="content"
      ></textarea>
      <div class="p-newIdea__price">
        <input
          type="number"
          name="price"
          class="p-ideaPrice"
          v-model="price"
          placeholder="金額 (単位：円)"
        />
      </div>
      <button type="submit" class="c-btnEntry c-btn">登録</button>
    </form>
  </div>
</template>

<script>
import { CREATED, UNPROCESSABLE_ENTITY, OK } from "../util";

export default {
  data() {
    return {
      preview: [],
      name: null,
      photo: [],
      outline: null,
      content: null,
      category_id: null,
      price: null,
      errors: null
    };
  },
  methods: {
    // フォームでファイルが選択されたら実行
    onFileChange(event) {
      // 何も選択されていなかったら処理中断
      if (event.target.files.length === 0) {
        console.log("画像が選択されていません");
        this.reset();
        return false;
      }

      // ファイルが画像ではなかったら処理中断
      if (!event.target.files[0].type.match("image.*")) {
        console.log("ファイルが画像ではありません");
        this.reset();
        return false;
      }

      // FileReaderクラスのインスタンスを取得
      const reader = new FileReader();

      // ファイルを読み込み終わったタイミングで実行
      reader.onload = e => {
        // previewに読み込み結果（データURL）を代入
        this.preview.push(e.target.result);
      };

      // データURL形式で受け取ったファイルを読み込む
      reader.readAsDataURL(event.target.files[0]);

      this.photo.push(event.target.files[0]);
    },
    // 入力欄の値をクリア
    reset() {
      this.preview = [];
      this.photo = [];
      this.$el.querySelector('input[type="file"]').value = null;
    },
    async submit() {
      const formData = new FormData();
      formData.append("name", this.name);
      formData.append("photo1", this.photo[0]);
      formData.append("photo2", this.photo[1]);
      formData.append("photo3", this.photo[2]);
      formData.append("photo4", this.photo[3]);
      formData.append("photo5", this.photo[4]);
      formData.append("outline", this.outline);
      formData.append("content", this.content);
      formData.append("category_id", this.category_id);
      formData.append("price", this.price);

      const response = await axios.post("/api/inspiration/create", formData);

      if (response.status === UNPROCESSABLE_ENTITY) {
        this.errors = response.data.errors;
        return false;
      }

      this.reset();

      if (response.status !== OK) {
        this.$store.commit("error/setCode", response.status);
        return false;
      }

      this.reset();

      // メッセージ登録
      this.$store.commit("message/setContent", {
        content: "写真が投稿されました！",
        timeout: 5000
      });

      this.reset();

      // 登録完了後、アイディア詳細ページへ移動
      this.$router.push(`/inspiration/${response.data.id}/idea`);
    }
  }
};
</script>