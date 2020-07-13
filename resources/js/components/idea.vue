<template>
  <div>
    <img class="p-idea__img" :src="item.photo1" :alt="`Photo by ${item.id}`" />

    <div class="p-itemCover">
      <p class="p-itemCover__outline">{{ item.outline }}</p>
      <RouterLink
        class="p-itemCover__link"
        :to="`/ideas/${item.id}`"
        :title="`View the photo by ${item.id}`"
      >
        詳細を見る
        <i class="fas fa-search-plus p-itemCover__icon"></i>
      </RouterLink>
    </div>

    <div class="p-idea__wrap">
      <p class="p-ideaTitle">{{ item.name }}</p>
      <span class="p-ideaCategory c-category">{{ item.category.name }}</span>
      <span class="p-ideaDay c-day">{{ item.created_at}}</span>
      <br />
      <i class="fas fa-star p-ideaStar c-star"></i>
      <span class="p-ideaMouth">{{ item.review_star }}( {{ item.reviews_count }}件)</span>
      <span class="p-ideaPrice c-price">{{ item.price }}円</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  }
};
</script>