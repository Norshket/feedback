import axios from 'axios'
import BaseApi from './baseApi'

class feedbackApi extends BaseApi {
  constructor (data = {}) {
    super()
    this.url = {
        feedback: () => `${this.apiUrl}/feedback/send`,
    }
  }

  feedback (data) {
    return axios.post(this.url.feedback(), data)
  }
}

export default feedbackApi