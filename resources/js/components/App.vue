
<template>
  <div>
    <b-button id="show-btn" @click="showModal">
      Форма обратной связи
    </b-button>

    <b-modal ref="my-modal" hide-footer hide-header-close title="Форма обратнйо связи">
      <b-form>
        <b-form-input id="input-1" v-model="form.email" type="email" placeholder="Email" class="mb-2">
        </b-form-input>

        <b-form-input id="input-1" v-model="form.phone" type="tel" placeholder="Телефон" class="mb-2">
        </b-form-input>

        <b-row class="mt-2">
          <b-col>
            <b-form-textarea id="textarea" v-model="form.text" placeholder="Обращение..." rows="3">
            </b-form-textarea>
          </b-col>
        </b-row>
      </b-form>

      <b-button class="mt-3" variant="outline-danger" block @click="hideModal">
        Закрыть
      </b-button>

      <b-button class="mt-3" variant="outline-primary" block @click="sendModal">
        Отправить
      </b-button>
    </b-modal>
  </div>
</template>
<script>
export default {

  data() {
    return {
      form: {
        email: '',
        phone: '',
        text: '',
      }
    }
  },

  methods: {

    showModal() {
      this.$refs['my-modal'].show()
    },

    hideModal() {
      this.$refs['my-modal'].hide()
      this.resetForm()
    },

    sendModal() {
      this.$api.feedbackApi.feedback(this.form).then(({ data }) => {
        this.$toast.success('success');
        this.resetForm()
        this.hideModal()
      }).catch(({ response }) => {
        const errors = response.data.errors;
        Object.values(errors).forEach((error) => {
          this.$toast.error(error[0])
        })

      })
    },

    resetForm() {
      this.form.email = ''
      this.form.phone = ''
      this.form.text = ''
    }
  }
}
</script>