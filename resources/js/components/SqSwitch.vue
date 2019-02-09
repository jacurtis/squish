<template>
  <div class="ios-switch" :class="{ active : value }" v-on:click="toggleSwitch">
    <span class="switch-body">
      <span class="toggle"></span>
    </span>
    <input type="checkbox" v-model="value" v-bind="$attrs" v-on="inputListeners">
    <label><slot></slot></label>
  </div>
</template>

<style lang="scss" scoped>
@import "../../sass/_variables.scss";

.ios-switch {
  display: flex;
  align-items: center;
  margin: 0;
  input[type=checkbox] {
    display: none;
  }
  label {
    display: inline-flex;
    font-weight: bold;
    margin-left: 10px;
    font-family: sans-serif;
  }
  .switch-body {
    border: solid 1px grey;
    border-radius: 999px;
    display: inline-flex;
    justify-content: flex-start;
    cursor: pointer;
    width: 48px;
    background-color: #ddd;
    box-shadow: inset 0 2px 4px 0 rgba(0,0,0,0.1);
    transition: all 0.2s ease;
        
    .toggle {
      border-radius: 50%;
      border: solid 1px grey;
      width: 24px;
      height: 24px;
      background-color: white;
      box-shadow: 0 2px 4px 0 rgba(0,0,0,0.25);
      box-sizing: border-box;
      transition: transform 0.3s ease;
    }
  }
  &.active .switch-body {
    background-color: $success;
    
    .toggle {
      transform: translateX(100%);
    }
  }
}
</style>

<script>
export default {
  inheritAttrs: false,
  props: {
    value: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    inputListeners: function () {
      var vm = this
      return Object.assign({},
        this.$listeners, {
          input: function (event) {
            vm.$emit('input', event.target.checked)
          }
        }
      )
    }
  },
  methods: {
    toggleSwitch() {
      this.$emit('input', !this.value)
    }
  }
}
</script>
