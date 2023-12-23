<template>
  <button
    type="button"
    :class="className"
    data-toggle="modal"
    :data-target="'#' + modalId "
  >
  <i :class="iconName"></i><span v-if="buttonText">&nbsp;&nbsp;</span>{{ buttonText }}
  </button>

  <div
    class="modal fade"
    :id="modalId"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> {{ title }}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <slot></slot>
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["title", "buttonText", "className", "iconName", "modalId"],

};
</script>
