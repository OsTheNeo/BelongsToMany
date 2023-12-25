<template>
	<div>
    <span v-for="(resource, key) in field.value" class="single">
      <Link @click.stop :href="getResourceUrl(resource.id)"
	      class="link-default" v-if="field.viewable">
        {{ getProperty(resource, optionsLabel) }}
      </Link>
      <span v-else>{{ getProperty(resource, optionsLabel) }}</span>
    </span>
	</div>
</template>

<script>
export default {
	name: "IndexField",
	props: ["resourceName", "field"],
	data() {
		return {
			optionsLabel: this.field.optionsLabel,
		};
	},
	methods: {
		getProperty(object, path, defaultValue) {
			return _.get(object, path, defaultValue);
		},
		getResourceUrl(resourceId) {
			const baseUrl = `/resources/${this.field.resourceNameRelationship}`;
			return this.$url(`${baseUrl}/${resourceId}`)
		}
	},
};
</script>
<style>
.single:not(:last-of-type) {
	&:after {
		content: ", ";
	}
}
</style>