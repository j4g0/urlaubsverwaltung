<template>
  <transition name="modal">
    <div class="modal-mask">
      <div class="modal-wrapper">

      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <!-- <h5 class="modal-title">Modal title</h5> -->
                  <slot name="title"></slot>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" @click="closeModal">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <slot></slot>
              </div>
              <slot name="footer"></slot>
              <!-- <div class="modal-footer"> -->
              <!--     <button type="button" class="btn btn-secondary" @click="closeModal">Close</button> -->
              <!--     <button type="button" class="btn btn-primary">Save changes</button> -->
              <!-- </div> -->
          </div>
      </div>

      </div>
    </div>
  </transition>
</template>

<script>
export default{
  name: 'EmployeeModal',
  data(){
    return{

    }
  },
  methods: {
    closeModal(){
      this.$emit('close-modal-event')
    }
  }
}
</script>

<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
</style>
