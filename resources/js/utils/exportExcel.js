export function exportExcel(response, filename) {
  const url = window.URL.createObjectURL(new Blob([response.data], { type: 'application/vnd.ms-excel' }))
  const link = document.createElement('a')
  link.href = url
  link.setAttribute('download', `${filename}.xls`)
  document.body.appendChild(link)
  link.click()
}
