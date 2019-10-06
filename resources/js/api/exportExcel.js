import axios from 'axios'
import { exportExcel } from '../utils/exportExcel'
import auth from '../store/modules/auth'

export function apiExportExcel(exportType, filename) {
  const options = {
      method: 'POST',
      url: 'http://127.0.0.1:8000/api/exportExcel',
    responseType: 'blob',
    headers: {
      Authorization: `Bearer ${auth.state.token}`
    },
      data: {
        exportType: exportType
      }
  }
  axios(options)
    .then((response) => {
      exportExcel(response, filename)
    })
    .catch((error) => {
      console.log(error)
    })
}
