<template>
  <div class="sq-input">
    <label class="label">{{ label }}</label>
    <input ref="inputval" v-on="inputListeners" class="input" :class="{'errors': !valid}" v-bind="$attrs" @input="isValid">
    <span class="error-message" v-if="!valid">{{ validate.message }}</span>
  </div>
</template>

<style lang="scss" scoped>
  @import "../../sass/_variables.scss";

  label.label {
    font-weight: bold;
    padding-bottom: 3px;
  }

  .error-message {
    padding-top: 3px;
    padding-left: 5px;
    color: $danger;
  }

  .input {
    border-radius: 5px;
    border: 2px solid $border-color;
    box-shadow: none;

    &.errors {
      border: 2px solid lighten($danger, 25%);
      &:focus,
      &:focus-within {
        border: 2px solid $danger;
      }
    }

    &:focus,
    &:focus-within {
      border: 2px solid lighten($primary, 10%);
    }
  }

</style>


<script>
  export default {
    name: 'SqInput',
    inheritAttrs: false,
    data() {
      return {
        valid: true
      }  
    },
    props: {
      label: {
        type: String,
        default: ''
      },
      validate: {
        type: Object,
        default: null
      }
    },
    computed: {
      inputListeners: function () {
        var vm = this
        return Object.assign({},
          this.$listeners, {
            input: function (event) {
              vm.$emit('input', event.target.value)
            }
          }
        )
      }
    },
    methods: {
      isValid: function() {
        if (this.validate.type === 'regex') {
          this.valid = this.validate.value.test(this.$refs.inputval.value)
        }
      }
    }
  }

</script>
